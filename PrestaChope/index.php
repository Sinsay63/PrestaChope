<?php

if (empty($_SESSION)) {
    session_name("Prestachope_6");
    session_start();
}

require_once("tools/SuperController.php");
require_once('tools/Rooter.php');
require_once('header.php');

$page = "accueil";
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}

SuperController::callPage($page);

require_once('footer.php');
?>