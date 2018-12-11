<?php

include('../app/app.php');

include_once ('inc/admin.inc.php');


load_header('Panel Administration - Support');

require_once('../app/Admin.php');
$admin = new Admin();

// offset de la base users //
if(empty($_GET['p']) || empty($_GET['p2'])) {
    $offset = 0;
    $offset2 = 10;
} else {
    $offset = $_GET['p'];
    $offset2 = $_GET['p2'];
}


?>
    <div class="row">

        <div class="col-2">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action" href="./index.php" role="tab" aria-controls="admin_homepage">Accueil</a>
                <a class="list-group-item list-group-item-action" href="./users.php" role="tab" aria-controls="profile">Utilisateurs</a>
                <a class="list-group-item list-group-item-action" href="./menu.php" role="tab" aria-controls="menu">Menu</a>
                <a class="list-group-item list-group-item-action" href="./booking.php" role="tab" aria-controls="res">Reservation</a>
                <a class="list-group-item list-group-item-action active" href="#" role="tab" aria-controls="support">Support</a>
            </div>
        </div>

        <div class="col-10">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($admin->getSupport($offset . ',' . $offset2) as $support) {?>
                    <tr>
                        <th scope="row"><?= $support['id']; ?></th>
                        <td><?= $support['email']; ?></td>
                        <td><?= $support['name']; ?></td>
                        <td><p><?= mb_strimwidth($support['message'], 0, 55, '...'); ?></p></td>
                        <td><?= $support['short_date']; ?></td>
                        <td>
                            <a href="<?= root_folder; ?>/admin/process/support/view.php?id=<?= $support['id']; ?>"><button type="button" class="btn btn-sm btn-info"><i class="far fa-eye"></i></button></a>
                            <a href="<?= root_folder; ?>/admin/process/support/delete.php?id=<?= $support['id']; ?>"><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php

load_footer();

?>