<?php
if(isset($_COOKIE['user'])) {
  $user = new User($_COOKIE['user']);
}
?>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Un simple site de restaurant">
    <meta name="author" content="Anthony ARJONA, Christopher HOSTIN">
    <link rel="icon" href="<?= resources_uri; ?>/images/favicon.ico">

    <title><?= $page_name . ' - ' . SITE_NAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= resources_uri; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= resources_uri; ?>/css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">

    <div class="container">

        <a class="navbar-brand" href="<?= root_folder; ?>/index.php">
            <img src="<?= resources_uri; ?>/images/nav_logo.svg.png" width="30" height="30" class="d-inline-block align-top" alt="">
            <?= SITE_NAME; ?>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= root_folder; ?>/index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= root_folder; ?>/our-menus.php">Nos Menus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= root_folder; ?>/booking.php">Les réservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= root_folder; ?>/contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= root_folder; ?>/plan.php">Plan</a>
                </li>
            </ul>
            <?php if(isset($_COOKIE['user'])) { ?>
             <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" <?= $user->isAdmin() ? 'style="color:  #009933"' : '' ?> href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> <?= ucfirst($user->getUsername()); ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <?= $user->isAdmin() ? '<a class="dropdown-item" style="color: #009933" href="' . root_folder . '/admin/"><i class="fas fa-cog"></i> Panel Admin</a>' : ''; ?>
                        <a class="dropdown-item" href="<?= root_folder; ?>/member.php"><i class="fas fa-user-circle"></i> Mon profil</a>

                        <div class="dropdown-divider"></div>

                        <div class="text-center">
                            <a href="<?= root_folder; ?>/process/logout-process.php"><button type="button" class="btn" style="background-color: rgba(255,0,14,0.7);"><i class="fas fa-sign-out-alt"></i><strong> Déconnexion</strong></button></a>
                        </div>
                    </div>
                </li>
             </ul>
            <?php } else { ?>
             <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= root_folder; ?>/login.php">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= root_folder; ?>/register.php">Inscription</a>
                </li>
            </ul>
            <?php } ?>
        </div>

    </div>

</nav>