<?php
include_once('app/app.php');
include_once('app/Menu.php');

$page_name = 'Nos menus';
$menu = new Menu();

load_header($page_name);
?>
<div class="row">
<?php foreach($menu->getAllMenu() as $data) { ?>

        <div class="col-md-4">
            <div class="card text-center">
                <img class="card-img-top" height="215px" src="<?= $data['image']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['name']; ?></h5>
                    <p class="card-text"><?= $data['desc']; ?></p>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?= root_folder; ?>/booking.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-sm float-left">Réserver</a>
                    <span class="float-right"><?= $data['price']; ?> €</span>
                </div>
            </div>
        </div>

<?php } ?>
</div>
<?php load_footer(); ?>