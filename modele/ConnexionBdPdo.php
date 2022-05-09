<?php

class ConnexionBdPdo {

    private static $lInstanceSingleton = null;
    private static $objPDO;

    private function __construct() {
        try {
            self::$objPDO = new PDO('mysql:host=mysql-meganesusini.alwaysdata.net;dbname=meganesusini_soirees', '243784', 'alwaysdata40');
            self::$objPDO->query("SET CHARACTER SET utf8");
            //echo "<br/>connexion réussie.<br/>";
        } catch (PDOException $erreur) {
            echo "Erreur de connexion à la base de données " . $erreur->getMessage();
        }
    }

    // La méthode singleton
    public static function getLInstanceSingleton() {
        if (self::$lInstanceSingleton == null) {
            self::$lInstanceSingleton = new ConnexionBdPdo();
        }
        return self::$lInstanceSingleton;
    }

    public static function getConnexion() {
        if (self::$lInstanceSingleton == null) {
            self::$lInstanceSingleton = new ConnexionBdPdo();
        }
        return self::$lInstanceSingleton::$objPDO;
    }

}
