<?php

include_once('app/app.php');
$page_name = 'Inscription';


if(isset($_COOKIE['user'])) {

    $session->create('message', 'Erreur vous etes déjà connecté.');
    $session->create('message-box-color', 'alert-info');

    header('location: ' . root_folder . '/index.php');

} else {

    load_header($page_name);

    ?>

        <div class="offset-2 col-md-8 col-xs-2">
            <div class="form-area text-center">
                <form id="form-contact" role="form" method="POST" action="./process/register-process.php">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Formulaire d'Inscription</h3>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Nom de famille" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Prénom" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Vérification de mot de passe" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="postal" name="postal" placeholder="Adresse" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Numéro de téléphone" required>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="Date de naissance" required>
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>

<?php load_footer(); } ?>
