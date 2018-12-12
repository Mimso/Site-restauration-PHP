<?php

/* import du fichier app */
require_once('../app/app.php');
require_once('../app/Menu.php');

/* verification que l'utilisateur n'est pas connecté */
if(empty($_COOKIE['user'])) {

    $session->create('message', 'Vous n\'etez pas connecté.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/login.php');

}

/* verification du bon envoie des données */
if(empty($_POST['comment']) || empty($_GET['mid'])) {

    $session->create('message', 'Erreur, un des champs est vide !.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/menu-information.php');
}

/*
 * definition des variables avec une fonction anti injection SQL
 * @link https://php.net/manual/en/function.htmlspecialchars.php
 */
$date = new DateTime();
$comment = $_POST['comment'];
$mid = $_GET['mid'];
$uid = $_COOKIE['user'];

$menu = new Menu($mid);
$commentaires = $menu->createCommentaire($mid, $uid, $comment);

if($commentaires == 1) {
    $session->create('message', 'Commentaire enrengistré avec succes.');
    $session->create('message-box-color', 'alert-success');

    header('location: ' . root_folder . '/menu-information.php?mid=' . $mid);
} else {
    $session->create('message', 'Erreur le commentaire n\'a pas été enrengistré.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/menu-information.php?mid=' . $mid);
}
