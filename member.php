<?php

include_once('app/app.php');
$page_name = 'Espace membre';


if(empty($_COOKIE['user'])) {

    $session->create('message', 'Erreur vous n\'etes pas connecté.');
    $session->create('message-box-color', 'alert-danger');

    header('location: ' . root_folder . '/login.php');
} else {

    $user = new User($_COOKIE['user']);
    $reservation = new Reservation();
    load_header($page_name);

?>

    <div class="row">
        <div class="offset-2 col-md-8">

            <div class="card">
                <h5 class="card-header">Information de profil</h5>
                <div class="row card-body">
                    <div class="col-md-3" style="padding-left: 30px;">
                        <div style="padding-bottom: 10px;">
                            <img class="card-img-top card-custom" src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($user->getEmail()))); ?>.jpg?s=300" alt="Card image cap">
                        </div>
                        <div class="text-center">
                            <a href="<?= root_folder; ?>/process/logout-process.php" class="btn btn-danger">Déconnexion</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h5 class="card-title">
                            Bienvenue, <span <?= $user->isAdmin() ? 'style="color:#009933;"' : ''; ?>><?= ucfirst($user->getLastName()) .'&nbsp;'. strtoupper($user->getFirstName()); ?></span>
                            <div class="float-right">
                                <a href="<?= root_folder; ?>/edit-profile.php" class="btn btn-info">Editer</a>
                            </div>
                        </h5>
                        <span class="card-text">Email : <?= $user->getEmail(); ?></span>
                        <br>
                        <span class="card-text">Date de naissance : <?= date("d/m/Y", strtotime($user->getBirthday())) . ' (' . $user->getAge() . ' ans)' ?></span>
                        <br>
                        <span class="card-text">Ville : <?= $user->getPostal(); ?></span>
                        <br>
                        <span class="card-text">Numéro de Téléphone : <?= $user->getPhone(); ?></span>
                        <br>
                        <span class="card-text">Groupe : <?= ucfirst(strtolower($user->getPermission())); ?></span>
                        <br>
                        <span class="card-text"><a href="<?= resources_uri . '/download/reservation-' . md5($user->getEmail()) . '.txt'; ?>">Télécharger votre fichier de reservation</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="padding-top: 15px;">
        <div class="offset-2 col-md-8">
            <div class="card">
                <h5 class="card-header">Mes reservation</h5>
                <div class="row card-body">

                 <?php
                     $reservation_datas = $reservation->getBookingById($_COOKIE['user']);

                     if($reservation_datas != null) {
                        foreach($reservation->getBookingById($_COOKIE['user']) as $res) {
                        $date = new DateTime($res['date']);
                 ?>

                    <div class="col-md-6" style="padding-top: 20px; padding-left: 30px;">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top menuimg" height="160px" src="<?= $res['image']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $res['name']; ?>
                                    <div class="float-right">
                                        <a href="<?= root_folder; ?>/process/delete-booking.php?id=<?= $res['reservation_id']; ?>"><button class="btn btn-sm btn-danger"><i class="far fa-times-circle"></i></button></a>
                                    </div>
                                </h5>
                                <p class="card-text"><?= mb_strimwidth($res['desc'], 0, 120, '...'); ?></p>
                            </div>

                            <div class="card-footer">
                                <span class="badge badge-success">le <?= $date->format('d/m/Y') ?></span>
                                <div class="float-right">
                                    <span class="badge badge-success">Pour <?= $res['number']; ?> <?=$res['number'] > 1 ? "personnes" : "personne"; ?></span>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="float-right">
                                    <span class="badge badge-info">Prix <?= $res['price']; ?>€ / Unité</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } } else { echo '<div class="col-md-12"><span class="badge badge-info">Aucune reservation</span></div>'; } ?>
                </div>
            </div>
        </div>
    </div>

    <?php load_footer(); } ?>