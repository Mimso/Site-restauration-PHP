<?php

include('../app/app.php');

include_once('./inc/admin.inc.php');

load_header('Panel Administration - Accueil');

require_once('../app/Admin.php');
$admin = new Admin();
?>
    <div class="row">
        <div class="col-2">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action" href="<?= root_folder ?>/admin/index.php" role="tab" aria-controls="admin_homepage">Accueil</a>
                <a class="list-group-item list-group-item-action" href="<?= root_folder . "/admin/users.php"; ?>" role="tab" aria-controls="profile">Utilisateurs</a>
                <a class="list-group-item list-group-item-action active" href="<?= root_folder . "/admin/menu.php"; ?>" role="tab" aria-controls="menu">Menu</a>
                <a class="list-group-item list-group-item-action" href="<?= root_folder . "/admin/booking.php"; ?>" role="tab" aria-controls="res">Reservation</a>
                <a class="list-group-item list-group-item-action" href="<?= root_folder . "/admin/support.php"; ?>" role="tab" aria-controls="support">Support</a>
                <a class="list-group-item list-group-item-action" href="<?= root_folder . "/admin/comment.php"; ?>" role="tab" aria-controls="comment">Commentaires</a>
            </div>
        </div>
        <div class="col-10">
            <div class="form-area text-center">
                <form id="form-contact" role="form" method="POST" action="process/menu/create.php">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Création de Menu</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom du menu" required>
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" id="desc" name="desc" required>Entrer ici votre description.</textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" step=0.01 class="form-control" id="price" name="price" placeholder="Prix du menu" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="image" name="image" placeholder="Url de votre image" required>
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Créer</button>
                </form>
            </div>
        </div>
    </div>

<?php

load_footer();

?>