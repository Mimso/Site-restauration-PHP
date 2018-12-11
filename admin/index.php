<?php

include('../app/app.php');

include_once ('inc/admin.inc.php');

load_header('Panel Administration - Accueil');

require_once('../app/Admin.php');
$admin = new Admin();

?>
    <div class="row">
        <div class="col-2">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" href="#" role="tab" aria-controls="admin_homepage">Accueil</a>
                <a class="list-group-item list-group-item-action" href="./users.php" role="tab" aria-controls="profile">Utilisateurs</a>
                <a class="list-group-item list-group-item-action" href="./menu.php" role="tab" aria-controls="menu">Menu</a>
                <a class="list-group-item list-group-item-action" href="./booking.php" role="tab" aria-controls="res">Reservation</a>
                <a class="list-group-item list-group-item-action" href="./support.php" role="tab" aria-controls="support">Support</a>
            </div>
        </div>
        <div class="col-10">
            <span>Bienvenue sur le panel Administrateur</span>
        </div>
    </div>

<?php

load_footer();

?>