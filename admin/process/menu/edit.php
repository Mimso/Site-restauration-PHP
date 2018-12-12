<?php

/* include le script principal */
include_once ('../../../app/app.php');

/* include admin requirements */
include_once ('../../inc/admin.inc.php');

/* chargement header */
load_header('Panel Administration - Menu');


require_once('../../../app/Admin.php');

/* initialisation class admin */
$admin = new Admin();

/* verification de l'envoie de l'id en GET */
isset($_GET['id']) ? $id = $_GET['id'] : $id = null;

/* affichage du formulaire */
if($admin->getMenuById($id) == false) {
    $session->create('message', 'Erreur dans la modification du menu.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/admin/menu.php');

} else {

    ?>

    <div class="offset-2 col-md-8 col-xs-2">
        <div class="form-area text-center">
            <form id="form-contact" role="form" method="POST"
                  action="<?= root_folder; ?>/admin/process/menu/edit-process.php?id=<?= $admin->getMenuById($id)['id']; ?>">
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Modification de menu</h3>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nom du menu :</span>
                    </div>
                    <input type="text" class="form-control" id="text" name="name" value="<?= $admin->getMenuById($id)['name'] ?>" placeholder="<?= $admin->getMenuById($id)['name'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description :</span>
                    </div>
                    <textarea type="text" class="form-control" id="desc" name="desc" required><?= $admin->getMenuById($id)['desc']; ?></textarea>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Prix :</span>
                    </div>
                    <input type="text" class="form-control" id="text" name="price" value="<?= $admin->getMenuById($id)['price'] ?>" placeholder="<?= $admin->getMenuById($id)['price'] ?>" required>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Url de l'image :</span>
                    </div>
                    <input type="text" class="form-control" id="image" name="image" value="<?= $admin->getMenuById($id)['image'] ?>"
                           placeholder="<?= $admin->getMenuById($id)['image'] ?>" required>
                </div>

                <button type="submit" id="submit" name="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>

    <?php load_footer(); } ?>
