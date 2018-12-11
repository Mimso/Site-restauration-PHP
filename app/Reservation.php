<?php

class Reservation {

    public $id;

    public function __construct() {}

    public function createBooking($users_id, $menu_id, $number, $date)
    {

        $pdo = new PDOConnect();
        $date = new DateTime($date);
        $query = $pdo->pdo_start()->prepare("INSERT INTO `reservation`(`users_id`, `menu_id`, `number`, `date`) VALUES (?,?,?,?)");
        $query->execute([
            $users_id,
            $menu_id,
            $number,
            $date->format('Y-m-d')
        ]);
        return $query->rowCount() == 1 ? true : false;
    }

    public function getBookingById($user_id) {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT users.id, reservation.id AS 'reservation_id', reservation.*, menu.* FROM reservation INNER JOIN users INNER JOIN menu WHERE users.id = ? AND reservation.users_id = ? AND menu.id = reservation.menu_id");
        $query->execute([$user_id, $user_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteBookingById($id, $user_id) {
        // verification que la reservation appartient bien a lutilisateur
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT * FROM reservation WHERE id = ? AND users_id = ?");
        $query->execute([$id, $user_id]);

        if($query->rowCount() == 1) {
            // suppression
            $query = $pdo->pdo_start()->prepare("DELETE FROM reservation WHERE id = ?");
            $query->execute([$id]);
            return true;
        } else {
            return false;
        }
    }

    public function spaceAvailableByDate($date) {

        $pdo = new PDOConnect();
        $date = new DateTime($date);

        $query = $pdo->pdo_start()->prepare("SELECT `number`, `date` FROM `reservation` WHERE `date` = ?");
        $query->execute([$date->format('Y-m-d')]);

        $number = 0;

        foreach($query->fetchAll(PDO::FETCH_ASSOC) as $data) {
            $number = $number + $data['number'];
        }
        return $number;

    }
}
