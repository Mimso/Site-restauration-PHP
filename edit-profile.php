<?php

include_once('app/app.php');
$page_name = 'Modification des informations';


if(empty($_COOKIE['user'])) {

    $session->create('message', 'Erreur vous n\'etes pas connecté.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/index.php');

} else {

    load_header($page_name);
    $user = new User($_COOKIE['user']);
    ?>

    <div class="offset-2 col-md-8 col-xs-2">
        <div class="form-area text-center">
            <form id="form-contact" role="form" method="POST" action="<?= root_folder; ?>/process/edit-profile-process.php">
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Modification de mon profil</h3>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email :</span>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user->getEmail(); ?>" placeholder="<?= $user->getEmail(); ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nom de famille :</span>
                    </div>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user->getFirstName(); ?>" placeholder="<?= $user->getFirstName(); ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Prénom :</span>
                    </div>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user->getLastName(); ?>" placeholder="<?= $user->getLastName(); ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Adresse :</span>
                    </div>
                    <input type="text" class="form-control" id="postal" name="postal" value="<?= $user->getPostal(); ?>" placeholder="<?= $user->getPostal(); ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Numéro de téléphone :</span>
                    </div>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->getPhone(); ?>" placeholder="<?= $user->getPhone(); ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date de naissance :</span>
                    </div>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $user->getBirthday(); ?>" placeholder="<?= $user->getBirthday(); ?>" required>
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>

    <?php load_footer(); } ?>
