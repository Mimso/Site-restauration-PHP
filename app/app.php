<?php
session_start();

const SITE_NAME = "Central Burger";
const resources_uri = "http://localhost:8090/restaurant/resources";
const root_folder = "http://localhost:8090/restaurant";

require_once('PDOConnect.php');
require_once('SessionManagment.php');
require_once('User.php');

if(isset($_COOKIE['user'])) {
    require_once('Reservation.php');
}

$session = new SessionManagment();

function load_header($page_name) {
    include_once('inc/header.php');
}
function load_footer() {
    include_once('inc/footer.php');
}
