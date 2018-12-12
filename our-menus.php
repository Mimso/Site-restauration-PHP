<?php
include_once('app/app.php');
include_once('app/Menu.php');

$page_name = 'Nos menus';
$menu = new Menu();

load_header($page_name);
?>
<div class="row">
<?php foreach($menu->getAllMenu() as $data) { ?>

        <div class="col-md-4" style="padding-top: 10px;">
            <div class="card text-center">
                <img class="card-img-top menuimg" height="215px" src="<?= $data['image']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><a style="text-decoration: none; color: #007bff;" href="<?= root_folder; ?>/menu-information.php?mid=<?= $data['id']; ?>"><?= $data['name']; ?></a></h5>
                    <p class="card-text"><?= mb_strimwidth($data['desc'], 0, 130, '...') ?></p>
                </div>
                <div class="card-body">
                    <div class="float-left">
                        <a class="btn btn-primary btn-sm" href="<?= root_folder; ?>/menu-information.php?mid=<?= $data['id']; ?>">Information</a>
                    </div>
                    <div class="float-left" style="padding-left: 7px;">
                        <a href="<?= root_folder; ?>/booking.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-sm float-left">Réserver</a>
                    </div>
                    <span class="float-right"><?= $data['price']; ?> €</span>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>

<?php } ?>
</div>
<?php load_footer(); ?>