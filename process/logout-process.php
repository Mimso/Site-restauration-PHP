<?php
require_once('../app/app.php');

if(isset($_COOKIE['user'])) {

    unset($_COOKIE['user']);
    setcookie('user', '', time() - 3600, '/');

    $session->create('message', 'Vous avez été déconnecté.');
    $session->create('message-box-color', 'alert-info');

} else {

    $session->create('message', 'Erreur vous n\'étiez pas connecté.');
    $session->create('message-box-color', 'alert-danger');
    
}

header('location: ' . root_folder . '/index.php');

?>
