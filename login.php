<?php

include_once('app/app.php');
load_header('Connexion');

if(isset($_COOKIE['user'])) {

    $session->create('message', 'Erreur vous etes déjà connecté.');
    $session->create('message-box-color', 'alert-info');

    header('location: ' . root_folder . '/index.php');

} else { ?>

    <!-- PAGE CONTENT -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Connexion</li>
            </ol>
        </nav>

        <?php if($session->isValid('message')) { ?>
            <div class="col-md-8 offset-2">
                <div class="alert <?= $session->flash('message-box-color'); ?> alert-dismissible fade show" role="alert">
                    <?= $session->flash('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        <?php } ?>

        <div class="offset-2 col-md-8 col-xs-2">
            <div class="form-area text-center">
                <form id="form-contact" role="form" method="POST" action="./process/login-process.php">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Formulaire de Connexion</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Connexion</button>
                </form>
            </div>
        </div>
    </div>

<?php load_footer(); } ?>
