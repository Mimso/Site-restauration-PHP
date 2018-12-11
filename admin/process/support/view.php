<?php

include('../../../app/app.php');

include_once ('../../inc/admin.inc.php');


load_header('Panel Administration - Support');

require_once('../../../app/Admin.php');
$admin = new Admin();
isset($_GET['id']) ? $id = $_GET['id'] : $id = null;


if($admin->getSupportById($id) == false) {
    $session->create('message', 'Erreur dans l\'affichage du message.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/admin/support.php');

} else {

    ?>

    <div class="offset-2 col-md-8 col-xs-2">
        <div class="form-area text-center">
            <form id="form-contact" role="form" method="POST" action="delete.php?id=<?= $admin->getSupportById($id)['id']; ?>">
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Support n°<?= $admin->getSupportById($id)['id']; ?></h3>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email :</span>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $admin->getSupportById($id)['email'] ?>" placeholder="<?= $admin->getSupportById($id)['email'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Message :</span>
                    </div>
                    <textarea type="text" class="form-control" id="message" name="message" required><?= $admin->getSupportById($id)['message']; ?></textarea>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nom :</span>
                    </div>
                    <input type="text" class="form-control" id="text" name="price" value="<?= $admin->getSupportById($id)['name'] ?>" placeholder="<?= $admin->getSupportById($id)['name'] ?>" required>
                </div>

                <button type="submit" id="submit" name="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>

    <?php load_footer(); } ?>
