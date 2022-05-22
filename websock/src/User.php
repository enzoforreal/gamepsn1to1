<?php

namespace MyApp;

use Ratchet\ConnectionInterface;

class User
{
    private $login;
    private $con;

    public function __construct(string $login, ConnectionInterface $con)
    {
        $this->login = $login;
        $this->con = $con;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getCon()
    {
        return $this->con;
    }
}
