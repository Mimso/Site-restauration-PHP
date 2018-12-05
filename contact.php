<?php
include_once('app/app.php');
$page_name = 'Nous contacter';

load_header($page_name);
isset($_COOKIE['user']) ? $user = new User($_COOKIE['user']) : '';
?>


<div class="offset-2 col-md-8 col-xs-2">
    <div class="form-area text-center">
        <form id="form-contact" role="form" method="POST" action="./process/contact-process.php">
            <br style="clear:both">
            <h3 style="margin-bottom: 25px; text-align: center;">Formulaire de Contact</h3>
            <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" <?php isset($_COOKIE['user']) ? 'value="'.$user->getEmail().'"' : ''; ?> required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nom - Prénom" <?php isset($_COOKIE['user']) ? 'value="' . $user->getFirstName() . ' ' . $user->getLastName() . '"' : ''; ?> required>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" id="message" name="message" placeholder="Entrer ici votre message" required></textarea>
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</div>


<?php load_footer(); ?>
