<?php

include_once('app/app.php');
$page_name = 'Accueil';

load_header($page_name);

?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" height="480px" width="100%"  src="resources/images/carousel.1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bienvenue sur notre site</h5>
                    <p>ceci est un message test</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" height="480px" width="100%" src="resources/images/carousel.2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" height="480px" width="100%" src="resources/images/carousel.3.jpg" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" height="480px" width="100%" src="resources/images/carousel.4.jpg" alt="Fourth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" height="480px" width="100%" src="resources/images/carousel.5.jpg" alt="Five slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


<?php load_footer(); ?>




