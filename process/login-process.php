<?php
require_once('../app/app.php');

if(isset($_COOKIE['user'])) {

    $session->create('message', 'Vous etez déjà connecté.');
    $session->create('message-box-color', 'alert-info');

    header('location: ' . root_folder . '/index.php');

} else {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $pdo = new PDOConnect();

    $query = $pdo->pdo_start()->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $query->execute([
        $email,
        md5($password)
    ]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($query->rowCount() == 1) {
        $session->create('message', 'Connection réussi.');
        $session->create('message-box-color', 'alert-success');
        setcookie('user', $result['id'], time() + 86400*10, '/');
        $pdo->pdo_close();
        header('location: ' . root_folder . '/index.php');

    } else {
        $session->create('message', 'Erreur lors de la connexion, merci de ré-essayer.');
        $session->create('message-box-color', 'alert-danger');
        $pdo->pdo_close();
        header('location: ' . root_folder . '/login.php');
    }
}
?>
