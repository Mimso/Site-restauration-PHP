<?php
include_once('app/app.php');
include_once('app/Menu.php');

if(isset($_GET['mid'])) {
    $mid = $_GET['mid'];
} else {
    $session->create('message', 'Aucun identifiant trouvé.');
    $session->create('message-box-color', 'alert-danger');
    header('location: ' . root_folder . '/our-menu.php');
}

$menu = new Menu($mid);
$page_name = 'Information menu - ' . $menu->getName();

$date = new DateTime();
$mid = $_GET['mid'];
$uid = $_COOKIE['user'];

$menu = new Menu($mid);
$commentaires = $menu->getCommentaire($mid);

load_header($page_name);
?>

    <div class="row">
        <div class="offset-1 col-md-10">

            <div class="card">
                <h5 class="card-header">Information sur le menu - <?= $menu->getName(); ?></h5>
                <div class="row card-body">
                    <div class="col-md-4" style="padding-left: 30px;">
                        <div style="padding-bottom: 10px;">
                            <img class="card-img-top card-m menuimg2" src="<?= $menu->getImage(); ?>" alt="Card image cap">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h5 class="card-title">
                            <?= $menu->getName(); ?>
                        </h5>
                        <span class="card-text"><?= $menu->getDescription(); ?></span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="offset-1 col-md-10">
                        <form id="form-postcomment" role="form" method="POST" action="./process/comment-process.php?mid=<?= $menu->getId(); ?>">
                            <div class="form-group">
                                <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Ecrivez ici votre commentaire" required></textarea>
                            </div>
                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
                <div class="container" style="padding-top: 10px;">
                    <div class="row">
                        <?php if($commentaires) { foreach($commentaires as $com) { ?>
                            <div style="padding-bottom: 10px;" class="col-2">
                                <img class="card-img-top card-u" src="https://www.gravatar.com/avatar/<?= md5(strtolower(trim($com['user_email']))); ?>.jpg?s=300" alt="Card image cap">
                            </div>
                            <div style="padding-bottom: 10px;" class="col-10">
                                <div class="card">
                                    <div class="card-header">
                                        <span>Message posté par</span>&nbsp;<span <?= $com['user_perm'] == 'ADMIN' ? 'style="color:#009933' : ''; ?>"> <?= strtoupper(mb_strimwidth($com['user_firstname'], 0, 1, '')) . '.' . ucfirst($com['user_lastname']); ?></span>
                                    </div>
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <p><?= $com['commentaires_message']; ?></p>
                                            <footer class="blockquote-footer"><?= $com['commentaires_date']; ?></footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php load_footer(); ?>