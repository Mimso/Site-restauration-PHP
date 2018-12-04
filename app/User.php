<?php

class User {

    public $result, $id;

    public function __construct($id)
    {
        $this->id = $id;

        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$this->id]);
        $this->result = $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getUsername() {
        return $this->result['username'];
    }

    public function getEmail() {
        return $this->result['email'];
    }

    public function getPhone() {
        return $this->result['phone'];
    }

    public function getPostal() {
        return $this->result['postal'];
    }

    public function getBirthday() {
        return $this->result['birthday'];
    }

    public function getPermission() {
        return $this->result['permission'];
    }

    public function isAdmin() {
        return $this->result['permission'] == "ADMIN" ? true : false;
    }

    public function getAge() {
        $dobObject = new DateTime(date("Y/m/d",strtotime($this->getBirthday())));
        $nowObject = new DateTime();
        $diff = $dobObject->diff($nowObject);
        return $diff->y;
    }



}