<?php

class Reservation {

    public $id;

    public function __construct() {}


    /* création d'un reservation */
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

    /* affichage d'une reservation selon Id */
    public function getBookingById($user_id) {
        $pdo = new PDOConnect();
        $query = $pdo->pdo_start()->prepare("SELECT users.id, reservation.id AS 'reservation_id', reservation.*, menu.* FROM reservation INNER JOIN users INNER JOIN menu WHERE users.id = ? AND reservation.users_id = ? AND menu.id = reservation.menu_id");
        $query->execute([$user_id, $user_id]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* suppression d'un reservation selon Id */
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

    /* verification de l'espace disponible selon la date */
    public function spaceAvailableByDate($date, $nb) {

        $pdo = new PDOConnect();
        $date = new DateTime($date);

        $query = $pdo->pdo_start()->prepare("SELECT `number`, `date` FROM `reservation` WHERE `date` = ?");
        $query->execute([$date->format('Y-m-d')]);

        $number = 0;

        foreach($query->fetchAll(PDO::FETCH_ASSOC) as $data) {
            $number = $number + $data['number'];
        }

        return $number + $nb;

    }

    /* systeme de gestion du fichier reservation (Edition)*/
    public function FileEdit($filename, $text) {
        if(file_exists($filename)) {
            $file = fopen($filename, 'a+');
            fputs($file, ',' . $text);
            fclose($file);
            return true;
        } else {
            $create = $this->FileCreate($filename);
            if($create == true) {
                $file = fopen($filename, 'a+');
                fputs($file, $text);
                fclose($file);
                return true;
            } else {
                return false;
            }
        }
    }
    /* systeme de gestion du fichier reservation (Suppression)*/
    public function FileDelete($filename) {
        unlink($filename);
        return file_exists($filename);
    }
    /* systeme de gestion du fichier reservation (Création) */
    public function FileCreate($filename) {
        $file = fopen($filename, 'w+');
        fclose($file);
        return file_exists($filename);
    }

}
