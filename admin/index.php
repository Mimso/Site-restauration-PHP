<?php

include('../app/app.php');

if(empty($_COOKIE['user'])) {
    $session->create('message', 'Erreur vous n\'etes pas connecté.');
    $session->create('message-box-color', 'alert-info');
    header('location: ' . root_folder . '/index.php');
}

$user = new User($_COOKIE['user']);

if($user->isAdmin() == false) {
    $session->create('message', 'Erreur Acces restraint.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/index.php');
}

echo "Bienvenue Admin";

?>