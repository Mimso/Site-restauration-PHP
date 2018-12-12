<?php

/* include the main script of the site */
include_once ('../../../app/app.php');

/* include admin requirements */
include_once ('../../inc/admin.inc.php');

/* import de la classe Admin */
require_once('../../../app/Admin.php');
/* initialisation de la classe Admin */
$admin = new Admin();

/* verification de l'envoie des données */
if(empty($_POST['name']) OR empty($_POST['desc']) OR empty($_POST['price']) OR empty($_POST['image'])) {

    $session->create('message', 'Erreur, un des champs est manquant.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/admin/menu-new.php');
}


/*
 * definition des variables avec une fonction anti injection SQL
 * @link https://php.net/manual/en/function.htmlspecialchars.php
 */
$name = htmlspecialchars($_POST['name']);
$desc = htmlspecialchars($_POST['desc']);
$price = htmlspecialchars($_POST['price']);
$image = htmlspecialchars($_POST['image']);

/* création du nouveau menu */
$menu = $admin->createMenu($name, $desc, $price, $image);


/* verification que la creation a bien eu lieu
 * si FALSE alors on affiche success
 * si TRUE alors on affiche error
 */
if($menu) {
    $session->create('message', 'Menu créer avec succes.');
    $session->create('message-box-color', 'alert-success');

    header('location: ' . root_folder . '/admin/menu.php');
} else {
    $session->create('message', 'Erreur lors de la création du menu.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/admin/menu-new.php');
}


