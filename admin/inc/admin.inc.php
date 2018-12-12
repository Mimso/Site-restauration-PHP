<?php

/* verification que l'utilisateur est bien connecté
 * true : null
 * false : SESSION[message] + redirect
 */
if(empty($_COOKIE['user'])) {
    $session->create('message', 'Erreur vous n\'etes pas connecté.');
    $session->create('message-box-color', 'alert-info');
    header('location: ' . root_folder . '/index.php');
}

/* initialisation de la classe Utilisateur */
$user = new User($_COOKIE['user']);

/* verification que l'utilisateur est bien dans le groupe 'ADMIN' */
if($user->isAdmin() == false) {
    $session->create('message', 'Erreur Acces restraint.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/index.php');
}

?>
