<?php
require_once('../app/app.php');

/* suppression d'une reservation par rapport a son id */

if(empty($_COOKIE['user'])) {
    $session->create('message', 'Erreur vous n\'etez pas connecté.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/member.php');
}

$reservation = new Reservation();

if(empty($_GET['id'])) {
    $session->create('message', 'Erreur, identifiant de reservation non renseigné.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/member.php');
} else {

    if($reservation->deleteBookingById($_GET['id'], $_COOKIE['user']) == false) {
        $session->create('message', 'Erreur accès refusé.');
        $session->create('message-box-color', 'alert-danger');
    } else {
        $session->create('message', 'Reservation suprimé.');
        $session->create('message-box-color', 'alert-success');
    }

    header('location: ' . root_folder . '/member.php');
}

