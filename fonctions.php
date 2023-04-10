<?php
    include("config.php");

    function connect(){
        try {
            
            $connexion = new PDO("mysql:host=".host."; dbname=".DB, user, pw, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            
            echo "Problème de connexion à la BDD <br>". $e->getMessage();

        }
        return $connexion;
    }

?>