<?php

session_name("Sinsay");
session_start();

require_once("tools/SuperController.php");
require_once('header.php');
require_once('footer.php');
$page = "connexion";
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}
SuperController::callPage($page);
?>		
