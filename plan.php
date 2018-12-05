<?php
include_once('app/app.php');
$page_name = 'Plan';
load_header($page_name);
?>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"/>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
    <script src="<?= resources_uri; ?>/js/map.js"></script>
<?php
load_footer();
?>