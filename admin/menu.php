<?php

include('../app/app.php');

include_once ('inc/admin.inc.php');

load_header('Panel Administration - Menu');

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
            <a class="list-group-item list-group-item-action active" href="#" role="tab" aria-controls="menu">Menu</a>
            <a class="list-group-item list-group-item-action" href="./booking.php" role="tab" aria-controls="res">Reservation</a>
            <a class="list-group-item list-group-item-action" href="./support.php" role="tab" aria-controls="support">Support</a>
        </div>
    </div>

    <div class="col-10">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du menu</th>
                <th scope="col">Description</th>
                <th scope="col">Prix</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($admin->getMenu($offset . ',' . $offset2) as $menu) {?>
                <tr>
                    <th scope="row"><?= $menu['id']; ?></th>
                    <td><?= $menu['name']; ?></td>
                    <td><?= mb_strimwidth($menu['desc'], 0, 60, '...') ?></td>
                    <td><?= $menu['price']; ?></td>
                    <td>
                        <a href="<?= root_folder; ?>/admin/process/menu/edit.php?id=<?= $menu['id']; ?>"><button type="button" class="btn btn-sm btn-warning"><i class="fas fa-user-edit"></i></button></a>
                        <a href="<?= root_folder; ?>/admin/process/menu/delete.php?id=<?= $menu['id']; ?>"><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>
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