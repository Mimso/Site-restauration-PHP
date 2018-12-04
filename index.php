<?php

include_once('app/app.php');

load_header('Accueil');

if($session->isValid('message')) { ?>
            <div class="col-md-4 offset-4">
                <div class="alert <?= $session->flash('message-box-color'); ?> alert-dismissible fade show" role="alert">
                    <?= $session->flash('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
<?php }

load_footer();

?>




