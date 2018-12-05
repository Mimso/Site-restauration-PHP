<?php

class Menu {

    public $result, $id;

    public function __construct($id = null)
    {
        $this->id = $id;
        if($id != null) {
            $pdo = new PDOConnect();
            $query = $pdo->pdo_start()->prepare("SELECT * FROM menu WHERE id = ?");
            $query->execute([$this->id]);
            $this->result = $query->fetch(PDO::FETCH_ASSOC);
        }

    }

    public function getId() {
        return $this->result['id'];
    }

    public function getName() {
        return $this->result['name'];
    }

    public function getDescription() {
        return $this->result['desc'];
    }

    public function getPrice() {
        return $this->result['price'];
    }

    public function getAllMenu() {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM menu WHERE 1");
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }



}