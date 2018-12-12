<?php

/* include le script principal */
include_once ('../../../app/app.php');

/* include admin requirements */
include_once ('../../inc/admin.inc.php');

// verification de l'envoie d'un id en method GET
if(empty($_GET['id'])) {
    $session->create('message', 'Erreur aucun identifiant trouver.');
    $session->create('message-box-color', 'alert-info');
    header('location: ' . root_folder . '/admin/menu.php');
} else {
    $id = $_GET['id'];
}

/* import de la classe Admin */
require_once('../../../app/Admin.php');
/* initialisation de la classe Admin */
$admin = new Admin();

/* verification que la suppression a bien eu lieu
 * si FALSE alors on affiche success
 * si TRUE alors on affiche error
 */
if($admin->delMenuById($id) != false) {

    $session->create('message', 'Menu supprimer avec succes.');
    $session->create('message-box-color', 'alert-success');
    header('location: ' . root_folder . '/admin/menu.php');

} else {
    $session->create('message', 'Erreur impossible de supprimer le menu.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/admin/menu.php');
}