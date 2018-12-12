<?php

class Admin
{

    public function __construct()
    {
    }

    /* affichage de tout les utilisateurs */
    public function getUsers($offset)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT `id`, `firstname`, `lastname`, `email`, `permission` FROM `users` ORDER BY id ASC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* affichage d'un utilisateur selon son id */
    public function getUserById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM `users` WHERE id = ? AND permission != 'ADMIN'");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /* edition d'un utilisateur selon son id */
    public function editUserById($id, $firstname, $email, $postal, $birthday, $phone, $lastname)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("UPDATE `users` SET `firstname`='$firstname',`email`='$email',`postal`='$postal',`birthday`='$birthday',`phone`='$phone',`lastname`='$lastname' WHERE id = ? AND permission != 'ADMIN'");
        $query->execute([$id]);
        return $query->rowCount();
    }

    /* supression d'un utilisateur selon son id */
    public function delUserById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM users WHERE id = ? AND permission != 'ADMIN'");
        $query->execute([$id]);

        if ($query->rowCount()) {
            $query_delete = $pdo->pdo_start()->prepare("DELETE FROM users WHERE id = ?");
            $query_delete->execute([$id]);
            return $query_delete->rowCount();
        } else {
            return false;
        }

    }

    /* affichage de tout les menus */
    public function getMenu($offset)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM `menu` ORDER BY id ASC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* affichage d'un menu selon son id */
    public function getMenuById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM `menu` WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /* création d'un menu */
    public function createMenu($name, $desc, $price, $image) {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("INSERT INTO `menu`(`name`, `desc`, `price`, `image`) VALUES (?,?,?,?)");
        $query->execute([
            $name,
            $desc,
            $price,
            $image
        ]);
        return $query->rowCount();

    }

    /* edition d'un menu selon son id */
    public function editMenuById($id, $name, $desc, $price, $image)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("UPDATE `menu` SET `name`='$name',`desc`='$desc',`price`='$price',`image`='$image' WHERE id = ?");
        $query->execute([$id]);
        return $query->rowCount();
    }

    /* suppression d'un menu selon son id */
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

    /* affichage de tout les messages supports */
    public function getSupport($offset)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT *, DATE_FORMAT(date,'%d/%m/%Y') AS 'short_date' FROM `contact` WHERE complete != 1 ORDER BY id DESC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* affichage d'un message support selon son id */
    public function getSupportById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM `contact` WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    /* suppression d'un message support selon son id */
    public function delSupportById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM contact WHERE id = ?");
        $query->execute([$id]);

        if ($query->rowCount()) {
            $query_complete = $pdo->pdo_start()->prepare("UPDATE contact SET complete = 1 WHERE id = ?");
            $query_complete->execute([$id]);
            return $query_complete->rowCount();
        } else {
            return false;
        }
    }

    /* affichage de toutes les reservations */
    public function getBooking($offset)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT users.id AS 'user_id', users.email AS 'user_email', users.phone AS 'user_phone', reservation.id AS 'reservation_id', reservation.number AS 'reservation_number', DATE_FORMAT(reservation.date,'%d/%m/%Y') AS 'reservation_date', menu.id AS 'menu_id', menu.name AS 'menu_name' FROM reservation INNER JOIN users INNER JOIN menu WHERE users.id = reservation.users_id AND menu.id = reservation.menu_id ORDER BY reservation.date DESC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* suppression d'une reservation selon son id */
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

    /* affichage de tout les commentaires */
    public function getComment($offset) {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT users.id AS 'user_id', users.firstname AS 'user_firstname', users.lastname AS 'user_lastname', users.permission AS 'user_perm', users.email AS 'user_email', menu.id AS 'menu_id', commentaires.id AS 'comment_id', commentaires.message AS 'comment_message', DATE_FORMAT(commentaires.date,'%d/%m/%Y') AS 'comment_date', commentaires.users_id, commentaires.menu_id FROM commentaires INNER JOIN users INNER JOIN menu WHERE users.id = commentaires.users_id AND menu.id = commentaires.menu_id ORDER BY commentaires.date DESC LIMIT $offset");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* suppression d'un commentaire selon son id*/
    public function delCommentById($id)
    {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM commentaires WHERE id = ?");
        $query->execute([$id]);

        if ($query->rowCount()) {
            $query_delete = $pdo->pdo_start()->prepare("DELETE FROM commentaires WHERE id = ?");
            $query_delete->execute([$id]);
            return $query_delete->rowCount();
        } else {
            return false;
        }
    }

    /* systeme de pagination */
    public function pagination($page)
    {
        $page = $page * 10;

        $pages = [
            $page - 10,
             $page,
        ];
        return $pages[0] < 0 ? 0 : $pages[0] . ',' . $pages[1];
    }

    /* systeme de pagination renvoi le chiffre de la page actuelle et celle des 2 suivantes */
    public function paginationGetPageNumber($page)
    {
        if ($page != 1) {
            return [
                $page - 1,
                $page,
                $page + 1,
            ];
        } else {
            return [0,1,2];
        }
    }
}
