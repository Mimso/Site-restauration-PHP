<?php

/* include le script principal */
include('../../../app/app.php');

include_once ('../../inc/admin.inc.php');


load_header('Panel Administration - Utilisateurs');

require_once('../../../app/Admin.php');
$admin = new Admin();
isset($_GET['id']) ? $id = $_GET['id'] : $id = null;

/* variable contenant les informations de l'utilisateur charger grace a une classe */
$u = $admin->getUserById($id);

if($u == false) {
    $session->create('message', 'Erreur dans la modification du profil.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/admin/users.php');

} else {

    ?>

    <div class="offset-2 col-md-8 col-xs-2">
        <div class="form-area text-center">
            <form id="form-contact" role="form" method="POST"
                  action="<?= root_folder; ?>/admin/process/users/edit-process.php?id=<?= $u['id']; ?>">
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Modification de mon profil</h3>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email :</span>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $u['email']; ?>"
                           placeholder="<?= $u['email'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nom de famille :</span>
                    </div>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="<?= $u['firstname'] ?>" placeholder="<?= $u['firstname'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Prénom :</span>
                    </div>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $u['lastname'] ?>"
                           placeholder="<?= $u['lastname'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Adresse :</span>
                    </div>
                    <input type="text" class="form-control" id="postal" name="postal" value="<?= $u['postal'] ?>"
                           placeholder="<?= $u['postal'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Numéro de téléphone :</span>
                    </div>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $u['phone'] ?>"
                           placeholder="<?= $u['phone'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date de naissance :</span>
                    </div>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?= $u['birthday'] ?>"
                           placeholder="<?= $u['birthday'] ?>" required>
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>

    <?php load_footer(); } ?>
