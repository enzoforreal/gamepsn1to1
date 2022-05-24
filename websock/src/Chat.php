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

    public function __construct()
    {
        echo "Starting websocket server game1to1\n";
        $this->clients = new \SplObjectStorage;
        $this->users = new \SplObjectStorage;
        $this->rooms = new \SplObjectStorage;
        $this->rooms->attach(new Room("public")); //Public chatroom available to all users
    }

    private function isConnected(ConnectionInterface $conn)
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


    private function getRoom(string $name)
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

        echo "New connection, id : {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        try {
            $data = json_decode($msg, true);
            $logged = false;
            $curUser = null;
            foreach ($this->users as $user) {
                if ($user->getCon() == $from) {
                    $logged = true;
                    $curUser = $user;
                }
            }
            if ($data['command'] == "connect") {
                if ($logged) {
                    echo "User " . $curUser->getLogin() . " Tried to login again\n";
                    return;
                }
                $decoded = JWT::decode($data['token'], new Key($this->key, 'HS256'));
                $decodedArray = (array) $decoded;
                $date = new \DateTime();
                if ($date->getTimestamp() - $decodedArray['issuedat'] > 60 * 60 * 24) {
                    echo "Connection {$from->resourceId} issued an expired token\n";
                    return;
                }
                $this->users->attach(new User($decodedArray['login'], $from));
                echo "User " . $decodedArray['login'] . " logged in from connection {$from->resourceId}\n";
                $from->send(json_encode(array(
                    "command" => "auth",
                    "status" => 1
                )));
            } else  if ($data['command'] == "join") {
                $user = $this->isConnected($from);
                if (!$user) {
                    $from->send(json_encode(array(
                        "command" => "auth",
                        "status" => 1
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
                        "status" => 1
                    )));
                    return;
                }
                $room = $this->getRoom($data['room']);
                $msg = $data['content'];
                $room->sendMsgToall($msg, $user);
                echo "Message received from {$user->getLogin()} for room {$room->getName()} : {$msg}\n";
            }
        } catch (\Exception $e) {
            echo "Could not decode incoming message from client({$from->resourceId}) : " . $e->getMessage() . "\n";
            $from->send(json_encode(array(
                "command" => "auth",
                "status" => 0
            )));
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
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
