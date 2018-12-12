<?php
include_once('app/app.php');
$page_name = 'Plan';
load_header($page_name);
?>

    <!-- OPENSTREETMAP API -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"/>

    <div id="map"></div>

    <script src="<?= resources_uri; ?>/js/leaflet-1.3.1.js"></script>
    <script src="<?= resources_uri; ?>/js/map.js"></script>

<?php
load_footer();
?>