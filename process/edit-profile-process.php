<?php
require_once('../app/app.php');

if(empty($_COOKIE['user'])) {

    $session->create('message', 'Vous n\'etez pas connecté.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/index.php');

}
/* verification du bon envoie des données */
if(empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['email']) OR empty($_POST['postal']) OR empty($_POST['birthday']) OR empty($_POST['phone'])) {
    $session->create('message', 'Erreur, un des champs est manquant.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/edit-profile.php');
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

$query = $pdo->pdo_start()->prepare("UPDATE `users` SET `firstname`='$firstname',`email`='$email',`postal`='$postal',`birthday`='$birthday',`phone`='$phone',`lastname`='$lastname' WHERE id = ?");
$query->execute([
    $_COOKIE['user']
]);

$session->create('message', 'Modification du profil effectuer.');
$session->create('message-box-color', 'alert-success');
$pdo->pdo_close();
header('location: ' . root_folder . '/member.php');
?>
