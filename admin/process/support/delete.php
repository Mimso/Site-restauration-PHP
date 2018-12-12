<?php

/* include le script principal */
include_once ('../../../app/app.php');

include_once ('../../inc/admin.inc.php');

/* verification de l'envoi de l'id en GET */
if(empty($_GET['id'])) {
    $session->create('message', 'Erreur aucun identifiant trouver.');
    $session->create('message-box-color', 'alert-info');
    header('location: ' . root_folder . '/admin/support.php');
} else {
    $id = $_GET['id'];
}

/* import et initialisation de la classe admin */
require_once('../../../app/Admin.php');
$admin = new Admin();

/* suppression d'un message support */
if($admin->delSupportById($id) != false) {

    $session->create('message', 'message supprimer avec succes.');
    $session->create('message-box-color', 'alert-success');
    header('location: ' . root_folder . '/admin/support.php');

} else {
    $session->create('message', 'Erreur impossible de supprimer le message.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/admin/support.php');
}