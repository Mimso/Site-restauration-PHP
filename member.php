<?php

include_once('app/app.php');
$page_name = 'Espace membre';


if(empty($_COOKIE['user'])) {

    $session->create('message', 'Erreur vous n\'etes pas connecté.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/login.php');
} else {
    $user = new User($_COOKIE['user']);
    load_header($page_name);
    ?>

    <div class="offset-2 col-md-8">
    <div class="card">
        <h5 class="card-header">Information de profil</h5>
        <div class="row card-body">
            <div class="col-md-3" style="padding-left: 30px;">
                <div style="padding-bottom: 10px;">
                    <img class="card-img-top card-custom" src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($user->getEmail()))); ?>.jpg?s=300" alt="Card image cap">
                </div>
                <div class="text-center">
                    <a href="<?= root_folder; ?>/process/logout-process.php" class="btn btn-danger">Déconnexion</a>
                </div>
            </div>
            <div class="col-md-9">
                <h5 class="card-title">Bienvenue, <span <?= $user->isAdmin() ? 'style="color:#009933;"' : ''; ?>><?= ucfirst($user->getLastName()) .'&nbsp;'. strtoupper($user->getFirstName()); ?></span></h5>
                <span class="card-text">Email : <?= $user->getEmail(); ?></span>
                <br>
                <span class="card-text">Date de naissance : <?= date("d/m/Y", strtotime($user->getBirthday())) . ' (' . $user->getAge() . ' ans)' ?></span>
                <br>
                <span class="card-text">Ville : <?= $user->getPostal(); ?></span>
                <br>
                <span class="card-text">Numéro de Téléphone : <?= $user->getPhone(); ?></span>
                <br>
                <span class="card-text">Groupe : <?= ucfirst(strtolower($user->getPermission())); ?></span>
            </div>
        </div>
    </div>
    </div>

    <?php load_footer(); } ?>