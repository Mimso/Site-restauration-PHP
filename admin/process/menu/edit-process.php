<?php
include('../../../app/app.php');

include_once ('../../inc/admin.inc.php');


load_header('Panel Administration - Menu');

require_once('../../../app/Admin.php');
$admin = new Admin();

/* verification du bon envoie des données */
if(empty($_GET['id'] OR empty($_POST['name']) OR empty($_POST['price']) OR empty($_POST['desc']) OR empty($_POST['image']))) {
    $session->create('message', 'Erreur un des champs est manquants.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/admin/process/menu/view.php');
}

/*
* definition des variables avec une fonction anti injection SQL
* @link https://php.net/manual/en/function.htmlspecialchars.php
*/
$name = htmlspecialchars($_POST['name']);
$desc = htmlspecialchars($_POST['desc']);
$price = htmlspecialchars($_POST['price']);
$image = htmlspecialchars($_POST['image']);


$pdo = new PDOConnect();
$id = $_GET['id'];

if($admin->editMenuById($id, $name, $desc, $price, $image) == true) {
    $session->create('message', 'Modification du menu effectuer.');
    $session->create('message-box-color', 'alert-success');
    $pdo->pdo_close();
    header('location: ' . root_folder . '/admin/menu.php');
} else {
    $session->create('message', 'Erreur dans la modification du menu.');
    $session->create('message-box-color', 'alert-danger');
    $pdo->pdo_close();
    header('location: ' . root_folder . '/admin/menu.php');
}



?>
