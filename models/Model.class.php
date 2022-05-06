<?php

abstract class Model{
    private static $pdo;

    private static function setBdd(){
        self::$pdo = new PDO("mysql:host=localhost:3307;dbname=game1to1bis;charset=utf8", "root", "root"); 
        //self::$pdo = new PDO("mysql:host=localhost:3306;dbname=game1to1;charset=utf8", "root", "root"); config nathan
        //self::$pdo = new PDO("mysql:host=localhost;dbname=game1to1;charset=utf8", "root", "Peyton242"); config  serveur 
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function getBdd(){
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }
}