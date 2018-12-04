<?php

include_once('app/app.php');
load_header('Espace membre');

if(empty($_COOKIE['user'])) {

    $session->create('message', 'Erreur vous n\'etes pas connecté.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/login.php');

} else { ?>

    <!-- PAGE CONTENT -->
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Accueil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Espace membre</li>
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




    </div>

    <?php load_footer(); } ?>
