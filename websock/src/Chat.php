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

        echo "New connection, id : ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        try {
            $data = json_decode($msg, true);
            if ($data['command'] == "connect") {
                $decoded = JWT::decode($data['token'], new Key($this->key, 'HS256'));
                $decodedArray = (array) $decoded;
                $this->users->attach(new User($decodedArray['login'], $from));
            }
        } catch (\Exception $e) {
            echo "Could not decode incoming message from client : " . $e->getMessage() . "\n";
            $from->send("Could not authenticate");
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
