<?php

abstract class Model
{
    private static $pdo;

    private static function setBdd()
    {
        $pathConf = "config.yml";

        $config = yaml_parse_file($pathConf);

        self::$pdo = new PDO("mysql:host=" . $config['dbHost'] . ":" . $config['dbPort'] . ";dbname=" . $config['dbName'] .
            ";charset=utf8", $config['dbLogin'], $config['dbPassword']);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
