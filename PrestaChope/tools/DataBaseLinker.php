<?php

class DataBaseLinker {

    private static $urlBDD = "mysql:host=localhost;dbname=prestachope_bdd6;";
    private static $username = "root";
    private static $password = "root";
    private static $connexion;

    static function getConnexion() {
        self::$connexion = new PDO(self::$urlBDD, self::$username, self::$password);
        return self::$connexion;
    }

}
