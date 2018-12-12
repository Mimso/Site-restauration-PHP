<?php

/* class de connexion SQL */
class PDOConnect {

    public function __construct($sql = ["localhost", "rest", "root", null]) {
        try {
            $this->bdd = new PDO("mysql:host={$sql[0]};dbname={$sql[1]}", $sql[2], $sql[3],
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function pdo_start() {
        return $this->bdd;
    }

    public function pdo_close() {
        return $this->bdd = null;
    }

}
?>
