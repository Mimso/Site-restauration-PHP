<?php

include('../app/app.php');

include_once ('inc/admin.inc.php');


load_header('Panel Administration - Support');

require_once('../app/Admin.php');
$admin = new Admin();

// offset de la base
if(isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 1;
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
                <?php foreach($admin->getSupport($admin->pagination($page)) as $support) {?>
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
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">

                    <li class="page-item <?= $admin->paginationGetPageNumber($page)[0] == 0 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="booking.php?p=<?= $admin->paginationGetPageNumber($page)[0] ?>" tabindex="-1">Précédent</a>
                    </li>

                    <li class="page-item disabled"><a class="page-link" href="booking.php?p=<?= $admin->paginationGetPageNumber($page)[1] ?>"><?= $admin->paginationGetPageNumber($page)[1] ?></a></li>

                    <li class="page-item">
                        <a class="page-link" href="booking.php?p=<?= $admin->paginationGetPageNumber($page)[2] ?>">Suivant</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

<?php

load_footer();

?>