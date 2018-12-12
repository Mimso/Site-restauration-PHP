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

    /* affichage Id */
    public function getId() {
        return $this->result['id'];
    }

    /* affichage nom */
    public function getName() {
        return $this->result['name'];
    }

    /* affichage description */
    public function getDescription() {
        return $this->result['desc'];
    }

    /* affichage prix */
    public function getPrice() {
        return $this->result['price'];
    }

    /* affichage image */
    public function getImage() {
        return $this->result['image'];
    }

    /* affichage de tout les menus */
    public function getAllMenu() {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM menu WHERE 1");
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
    }

    /* affichage de tout les commentaires */
    public function getCommentaire($mid) {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT users.id AS 'user_id', users.firstname AS 'user_firstname', users.lastname AS 'user_lastname', users.permission AS 'user_perm', users.email AS 'user_email', menu.id AS 'menu_id', commentaires.id AS 'commentaires_id', commentaires.message AS 'commentaires_message', DATE_FORMAT(commentaires.date,'%d/%m/%Y') AS 'commentaires_date', commentaires.users_id, commentaires.menu_id FROM commentaires INNER JOIN users INNER JOIN menu WHERE users.id = commentaires.users_id AND menu.id = commentaires.menu_id AND commentaires.menu_id = ? ORDER BY commentaires.date DESC LIMIT 0,10");
        $query->execute([
            $mid
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* création d'un commentaire */
    public function createCommentaire($mid, $uid, $comment) {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("INSERT INTO `commentaires`(`message`, `date`, `users_id`, `menu_id`) VALUES (?,?,?,?)");
        $query->execute([
                $comment,
                date("Y/m/d"),
                $uid,
                $mid
        ]);

        return $query->rowCount();
    }


}