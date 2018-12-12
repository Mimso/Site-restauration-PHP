<?php

include('../app/app.php');

include_once ('inc/admin.inc.php');


load_header('Panel Administration - Utilisateurs');

require_once('../app/Admin.php');
$admin = new Admin();

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
                <a class="list-group-item list-group-item-action active" href="#" role="tab" aria-controls="profile">Utilisateurs</a>
                <a class="list-group-item list-group-item-action" href="./menu.php" role="tab" aria-controls="menu">Menu</a>
                <a class="list-group-item list-group-item-action" href="./booking.php" role="tab" aria-controls="res">Reservation</a>
                <a class="list-group-item list-group-item-action" href="./support.php" role="tab" aria-controls="support">Support</a>
                <a class="list-group-item list-group-item-action" href="./comment.php" role="tab" aria-controls="comment">Commentaires</a>
            </div>
        </div>

        <div class="col-10">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($admin->getUsers($admin->pagination($page)) as $users) {?>
                <tr>
                    <th scope="row"><?= $users['id']; ?></th>
                    <td><?= $users['email']; ?></td>
                    <td><?= $users['firstname']; ?></td>
                    <td><?= $users['lastname']; ?></td>
                    <td><?= $users['permission']; ?></td>
                    <td>
                        <a href="<?= root_folder; ?>/admin/process/users/edit.php?id=<?= $users['id']; ?>"><button type="button" class="btn btn-sm btn-warning"><i class="fas fa-user-edit"></i></button></a>
                        <a href="<?= root_folder; ?>/admin/process/users/delete.php?id=<?= $users['id']; ?>"><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></a>
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