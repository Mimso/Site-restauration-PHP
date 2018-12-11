<?php

require_once('../app/app.php');

$res = new Reservation();
$res_date = $_GET['res_date'];


if($res->spaceAvailableByDate($res_date) <= 40) {
    var_dump($res->createBooking($_COOKIE['user'], '2', 10, '2018-12-10'));
} else {
    $session->create('message', 'Aucune place disponible merci de choisir un autre jour.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/booking.php');
}