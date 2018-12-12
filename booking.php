<?php
include_once('app/app.php');
$page_name = 'Réservation';

load_header($page_name);
include_once ('app/Menu.php');
?>


    <div class="offset-2 col-md-8 col-xs-2">
        <div class="form-area text-center">
            <form id="form-contact" role="form" method="POST" action="./process/booking-process.php">
                <br style="clear:both">
                <h3 style="margin-bottom: 25px; text-align: center;">Effectuer une réservation</h3>

                <select class="form-control" name="menu_id">
                <?php
                $menu = new Menu();
                foreach($menu->getAllMenu() as $data) {
                ?>
                <option value="<?= $data['id']; ?>" <?= isset($_GET['id']) && $_GET['id'] == $data['id'] ? "selected" : '' ?>><?= $data['name']; ?></option>
                <?php } ?>
                </select>

                <br style="clear:both">

                <div class="form-group">
                    <input type="number" class="form-control" id="number" name="number" placeholder="Nombre de reservation (maximum de 40/p par jour)" required>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" id="res_date" name="res_date" placeholder="Date" required>
                </div>

                <button type="submit" id="submit" name="submit" class="btn btn-primary">Reservé</button>
            </form>
        </div>
    </div>


<?php load_footer(); ?>