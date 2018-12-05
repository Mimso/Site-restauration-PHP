<?php
/* import du fichier app */
require_once('../app/app.php');

/* verification que l'utilisateur n'est pas connecté */
if(isset($_COOKIE['user'])) {
    $session->create('message', 'Vous etez déjà connecté.');
    $session->create('message-box-color', 'alert-info');

    header('location: ' . root_folder . '/index.php');

}

/* verification du bon envoie des données */
if(empty($_POST['firstname']) OR empty($_POST['lastname']) OR empty($_POST['password']) OR empty($_POST['password2') OR empty($_POST['email']) OR empty($_POST['postal']) OR empty($_POST['birthday']) OR empty($_POST['phone'])) {
    $session->create('message', 'Erreur, un des champs est manquant.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/register.php');
}

/*
 * definition des variables avec une fonction anti injection SQL
 * @link https://php.net/manual/en/function.htmlspecialchars.php
 */
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$password = htmlspecialchars($_POST['password']);
$password2 = htmlspecialchars($_POST['password2']);
$email = htmlspecialchars($_POST['email']);
$postal = htmlspecialchars($_POST['postal']);
$birthday = htmlspecialchars($_POST['birthday']);
$phone = htmlspecialchars($_POST['phone']);

if($_POST['password'] != $_POST['password2']) {
    $session->create('message', 'Erreur les mots de passe sont différents.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/register.php');
}

$pdo = new PDOConnect();

$query = $pdo->pdo_start()->prepare("SELECT email, phone FROM users WHERE email = ? OR phone = ?");
$query->execute([
    $email,
    $phone
]);
$result = $query->fetch(PDO::FETCH_ASSOC);

if($query->rowCount()) {
    $session->create('message', 'Erreur, cette email ou ce numéro de téléphone est déjà enrengistrer.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/register.php');
    exit();
} else {
    $query = $pdo->pdo_start()->prepare("INSERT INTO `users`(`email`, `firstname`, `lastname`, `password`, `phone`, `birthday`, `postal`) VALUES (?,?,?,?,?,?,?)");
    $query->execute([
        $email,
        $firstname,
        $lastname,
        md5($password),
        $phone,
        $birthday,
        $postal
    ]);

    /* envoie mail confirmation */
    $to      = $email;
    $subject = 'Inscription de ' . $lastname . ' ' . $firstname;
    $message = 'Bonjour ' . $lastname . ' je confirme ton inscription sur ' . SITE_NAME . ' avec l\'email : ' . $email;
    $headers = array(
        'From' => 'webmaster@localhost',
        'Reply-To' => 'webmaster@localhost',
        'X-Mailer' => 'PHP/' . phpversion()
    );

    mail($to, $subject, $message, $headers);
    /* fin envoie mail */

    $session->create('message', 'Inscription réussi.');
    $session->create('message-box-color', 'alert-success');
    $pdo->pdo_close();
    header('location: ' . root_folder . '/login.php');

}

?>
