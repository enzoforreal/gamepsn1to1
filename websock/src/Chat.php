<?php

namespace MyApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Chat implements MessageComponentInterface
{
    protected $clients;
    protected $users;
    private $rooms;
    private $key = "ThisIsAVeryVeryLongsecret1234";
    private $pathConf = "config.yml";
    private $dbCon;

    private function initDb($config)
    {
        echo "Connecting to the database\n";
        $this->dbCon = new \PDO("mysql:host=" . $config['dbHost'] . ":" . $config['dbPort'] . ";dbname=" . $config['dbName'] .
            ";charset=utf8", $config['dbLogin'], $config['dbPassword']);
        $this->dbCon->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        echo "Database OK\n";
    }

    private function dbLogMsg(string $msg, User $from, Room $room): bool
    {
        $req = "INSERT INTO messagepublic (message, authorLogin, room) VALUES(:message, :authorLogin, :room);";
        $stmt = $this->dbCon->prepare($req);
        $stmt->bindValue(":message", $msg, \PDO::PARAM_STR);
        $stmt->bindValue(":authorLogin", $from->getLogin(), \PDO::PARAM_STR);
        $stmt->bindValue(":room", $room->getName(), \PDO::PARAM_STR);
        $stmt->execute();
        $estcrée = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estcrée;
    }

    public function __construct()
    {
        echo "Starting websocket server game1to1\n";
        echo "Reading configuration file...\n";

        $config = yaml_parse_file($this->pathConf);
        $this->initdb($config);

        $this->clients = new \SplObjectStorage;
        $this->users = new \SplObjectStorage;
        $this->rooms = new \SplObjectStorage;
        $this->rooms->attach(new Room("public")); //Public chatroom available to all users
        echo "Server up and waiting for connections\n";
    }

    private function isConnected(ConnectionInterface $conn): User | false
    {
        $logged = false;
        $curUser = null;
        foreach ($this->users as $user) {
            if ($user->getCon() == $conn) {
                $logged = true;
                $curUser = $user;
            }
        }
        return $logged == true ? $curUser : false;
    }


    private function getRoom(string $name): Room | false
    {
        foreach ($this->rooms as $room) {
            if ($room->getName() == $name) {
                return $room;
            }
        }
        return false;
    }


    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        echo "New connection ({$conn->remoteAddress}), id : {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        try {
            $data = json_decode($msg, true);
            $curUser = $this->isConnected($from);
            if ($data['command'] == "connect") {
                if ($curUser) {
                    echo "User " . $curUser->getLogin() . " Tried to login again\n";
                    return;
                }
                $decoded = JWT::decode($data['token'], new Key($this->key, 'HS256'));
                $decodedArray = (array) $decoded;
                $date = new \DateTime();
                if ($date->getTimestamp() - $decodedArray['issuedat'] > 60 * 60 * 24) {
                    echo "Connection ($from->remoteAddress) {$from->resourceId} issued an expired token\n";
                    return;
                }
                $this->users->attach(new User($decodedArray['login'], $from));
                echo "User " . $decodedArray['login'] . " logged in from connection {$from->resourceId}\n";
                $from->send(json_encode(array(
                    "command" => "auth",
                    "status" => 1,
                    "self" => $decodedArray['login']
                )));
            } else  if ($data['command'] == "join") {
                $user = $this->isConnected($from);
                if (!$user) {
                    $from->send(json_encode(array(
                        "command" => "auth",
                        "status" => 0
                    )));
                    return;
                }
                $room = $this->getRoom($data['name']);
                echo "User {$user->getLogin()} requested to join room {$room->getName()}\n";
                $room->addUser($user);
            } else  if ($data['command'] == "msg") {
                $user = $this->isConnected($from);
                if (!$user) {
                    $from->send(json_encode(array(
                        "command" => "auth",
                        "status" => 0
                    )));
                    return;
                }
                $room = $this->getRoom($data['room']);
                $msg = $data['content'];
                $room->sendMsgToall($msg, $user);
                $this->dbLogMsg($msg, $user, $room);
                echo "Message received from {$user->getLogin()} for room {$room->getName()} : {$msg}\n";
            }
        } catch (\Exception $e) {
            echo "Could not decode incoming message from client{$from->resourceId} : " . $e->getMessage() . "\n";
            $from->send(json_encode(array(
                "command" => "auth",
                "status" => 0
            )));
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection ($conn->remoteAddress) {$conn->resourceId} has disconnected\n";
        foreach ($this->users as $user) {
            if ($user->getCon() == $conn) {
                $this->users->detach($user);
                echo "User " . $user->getLogin() . " disconnected\n";
            }
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
