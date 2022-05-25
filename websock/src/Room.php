<?php

namespace MyApp;

use Ratchet\ConnectionInterface;
use MyApp\Chat;

class Room
{
    private $users;
    private $name;

    public function __construct(string $name)
    {
        $this->users = new \SplObjectStorage;
        $this->name = $name;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function addUser(User $user)
    {
        $this->users->attach($user);
    }
    public function sendMsgToAll(string $msg, User $from)
    {
        if (!$this->isMember($from))
            return;
        foreach ($this->users as $user) {
            $user->getCon()->send(json_encode(array(
                "command" => "msg",
                "content" => $msg,
                "from" => $from->getLogin(),
            )));
        }
    }

    public function isMember(User $user)
    {
        return $this->users->contains($user);
    }

    public function getName()
    {
        return $this->name;
    }
}
