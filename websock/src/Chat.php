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
    private $key = "ThisIsAVeryVeryLongsecret1234";

    public function __construct()
    {
        echo "Starting websocket server game1to1\n";
        $this->clients = new \SplObjectStorage;
        $this->users = new \SplObjectStorage;
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
            }
        } catch (\Exception $e) {
            echo "Could not decode incoming message from client({$from->resourceId}) : " . $e->getMessage() . "\n";
            $from->send("Could not authenticate");
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
