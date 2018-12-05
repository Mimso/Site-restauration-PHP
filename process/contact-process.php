<?php
/* import du fichier app */
require_once('../app/app.php');


/* verification du bon envoie des données */
if(empty($_POST['email']) OR empty($_POST['name']) OR empty($_POST['message'])) {
    $session->create('message', 'Erreur, un des champs est manquant.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/contact.php');
}

/*
 * definition des variables avec une fonction anti injection SQL
 * @link https://php.net/manual/en/function.htmlspecialchars.php
 */
$email = htmlspecialchars($_POST['email']);
$name = htmlspecialchars($_POST['name']);
$message = htmlspecialchars($_POST['message']);

$pdo = new PDOConnect();


$query = $pdo->pdo_start()->prepare("INSERT INTO `contact`(`email`, `name`, `message`, `date`) VALUES (?,?,?,?)");
$query->execute([
    $email,
    $name,
    $message,
    date("Y/m/d H:i:s")
]);

$session->create('message', 'Message envoyer merci, une réponse vous sera envoyer au plus vite.');
$session->create('message-box-color', 'alert-success');
$pdo->pdo_close();

header('location: ' . root_folder . '/index.php');

?>
