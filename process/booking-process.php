<?php

/* import du fichier app */
require_once('../app/app.php');

/* verification que l'utilisateur n'est pas connecté */
if(empty($_COOKIE['user'])) {

    $session->create('message', 'Vous n\'etez pas connecté.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/login.php');

}

/* verification du bon envoie des données */
if(empty($_POST['res_date']) OR empty($_POST['menu_id']) OR empty($_POST['number'])) {

    $session->create('message', 'Erreur, un des champs est manquant.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/booking.php');
}

if($number > 40) {
    $session->create('message', 'Attention nous pouvons accueillir un maximum de 40 personnes par jour.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/booking.php');
}

/*
 * definition des variables avec une fonction anti injection SQL
 * @link https://php.net/manual/en/function.htmlspecialchars.php
 */
$res_date = htmlspecialchars($_POST['res_date']);
$menu_id = htmlspecialchars($_POST['menu_id']);
$number = htmlspecialchars($_POST['number']);
$user_id = $_COOKIE['user'];

$res = new Reservation();

if($res->spaceAvailableByDate($res_date, $number) <= 40) {

    $booking = $res->createBooking($user_id, $menu_id, $number, $res_date);

    if($booking == true) {
        $session->create('message', 'Votre reservation a été prise en compte.');
        $session->create('message-box-color', 'alert-success');
        header('location: ' . root_folder . '/index.php');
    } else {
        $session->create('message', 'Une erreur c\'est produite.');
        $session->create('message-box-color', 'alert-danger');
        header('location: ' . root_folder . '/booking.php');
    }

} else {

    $session->create('message', 'Nous n\'avons pas assez de place disponible pour la date du ' . $res_date);
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/booking.php');

}