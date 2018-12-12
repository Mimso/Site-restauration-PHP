<?php
require_once('../app/app.php');

/* systeme de connexion de l'utilisateur */
if(isset($_COOKIE['user'])) {

    $session->create('message', 'Vous etez déjà connecté.');
    $session->create('message-box-color', 'alert-info');

    header('location: ' . root_folder . '/index.php');

}

/* verification du bon envoie des données */
if(empty($_POST['email']) || empty($_POST['password'])) {
    $session->create('message', 'Erreur, un des champs est manquant.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/login.php');
}

/*
 * definition des variables avec une fonction anti injection SQL
 * @link https://php.net/manual/en/function.htmlspecialchars.php
 */
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$user = new User();
$log = $user->log($email, $password);


if($log) {
    $session->create('message', 'Connexion réussie.');
    $session->create('message-box-color', 'alert-success');
    setcookie('user', $log['id'], time() + 86400*10, '/');
    header('location: ' . root_folder . '/index.php');
} else {
    $session->create('message', 'Erreur lors de la connexion, merci de ré-essayer.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/login.php');
}

