<?php

class Admin
{

    public function __construct(){}

    public function getUsers($offset = '0,10')
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT `id`, `firstname`, `lastname`, `email`, `permission` FROM `users` ORDER BY id ASC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM `users` WHERE id = ? AND permission != 'ADMIN'");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function editUserById($id, $firstname, $email, $postal, $birthday, $phone, $lastname)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("UPDATE `users` SET `firstname`='$firstname',`email`='$email',`postal`='$postal',`birthday`='$birthday',`phone`='$phone',`lastname`='$lastname' WHERE id = ? AND permission != 'ADMIN'");
        $query->execute([$id]);
        return $query->rowCount();
    }

    public function delUserById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM users WHERE id = ? AND permission != 'ADMIN'");
        $query->execute([$id]);

        if($query->rowCount()) {
            $query_delete = $pdo->pdo_start()->prepare("DELETE FROM users WHERE id = ?");
            $query_delete->execute([$id]);
            return $query_delete->rowCount();
        } else {
            return false;
        }

    }

    public function getMenu($offset = '0,10')
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM `menu` ORDER BY id ASC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMenuById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM `menu` WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function editMenuById($id, $name, $desc, $price, $image)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("UPDATE `menu` SET `name`='$name',`desc`='$desc',`price`='$price',`image`='$image' WHERE id = ?");
        $query->execute([$id]);
        return $query->rowCount();
    }

    public function delMenuById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM menu WHERE id = ?");
        $query->execute([$id]);

        if ($query->rowCount()) {
            $query_delete = $pdo->pdo_start()->prepare("DELETE FROM menu WHERE id = ?");
            $query_delete->execute([$id]);
            return $query_delete->rowCount();
        } else {
            return false;
        }
    }

    public function getSupport($offset = '0,10')
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS 'short_date' FROM `contact` ORDER BY id ASC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSupportById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM `contact` WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function delSupportById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM contact WHERE id = ?");
        $query->execute([$id]);

        if ($query->rowCount()) {
            $query_delete = $pdo->pdo_start()->prepare("DELETE FROM contact WHERE id = ?");
            $query_delete->execute([$id]);
            return $query_delete->rowCount();
        } else {
            return false;
        }
    }

    public function getBooking($offset = '0,10') {
        $pdo = new PDOConnect();
            $query = $pdo->pdo_start()->prepare("SELECT users.id AS 'user_id', users.email AS 'user_email', users.phone AS 'user_phone', reservation.id AS 'reservation_id', reservation.number AS 'reservation_number', DATE_FORMAT(reservation.date,'%d/%m/%Y') AS 'reservation_date', menu.name AS 'menu_name' FROM reservation INNER JOIN users INNER JOIN menu WHERE menu.id = reservation.menu_id ORDER BY reservation.date ASC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delBookingById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM reservation WHERE id = ?");
        $query->execute([$id]);

        if ($query->rowCount()) {
            $query_delete = $pdo->pdo_start()->prepare("DELETE FROM reservation WHERE id = ?");
            $query_delete->execute([$id]);
            return $query_delete->rowCount();
        } else {
            return false;
        }
    }
}
