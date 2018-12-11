<?php
include('../../../app/app.php');

include_once ('../../inc/admin.inc.php');


load_header('Panel Administration - Utilisateurs');

require_once('../../../app/Admin.php');
$admin = new Admin();

/* verification du bon envoie des données */
if(empty($_GET['id'] OR empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['email']) OR empty($_POST['postal']) OR empty($_POST['birthday']) OR empty($_POST['phone']))) {
    $session->create('message', 'Erreur un des champs est manquants.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/admin/process/users/view.php');
}

/*
* definition des variables avec une fonction anti injection SQL
* @link https://php.net/manual/en/function.htmlspecialchars.php
*/
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$email = htmlspecialchars($_POST['email']);
$postal = htmlspecialchars($_POST['postal']);
$birthday = htmlspecialchars($_POST['birthday']);
$phone = htmlspecialchars($_POST['phone']);

$pdo = new PDOConnect();
$id = $_GET['id'];

if($admin->editUserById($id, $firstname, $email, $postal, $birthday, $phone, $lastname) == true) {
    $session->create('message', 'Modification du profil effectuer.');
    $session->create('message-box-color', 'alert-success');
    $pdo->pdo_close();
    header('location: ' . root_folder . '/admin/users.php');
} else {
    $session->create('message', 'Erreur dans la modification du profil.');
    $session->create('message-box-color', 'alert-danger');
    $pdo->pdo_close();
    header('location: ' . root_folder . '/admin/users.php');
}



?>
