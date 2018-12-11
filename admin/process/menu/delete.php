<?php

include_once ('../../../app/app.php');

include_once ('../../inc/admin.inc.php');

if(empty($_GET['id'])) {
    $session->create('message', 'Erreur aucun identifiant trouver.');
    $session->create('message-box-color', 'alert-info');
    header('location: ' . root_folder . '/admin/menu.php');
} else {
    $id = $_GET['id'];
}

require_once('../../../app/Admin.php');
$admin = new Admin();

if($admin->delMenuById($id) != false) {

    $session->create('message', 'Menu supprimer avec succes.');
    $session->create('message-box-color', 'alert-success');
    header('location: ' . root_folder . '/admin/menu.php');

} else {
    $session->create('message', 'Erreur impossible de supprimer le menu.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/admin/menu.php');
}