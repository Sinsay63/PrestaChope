    <?php
    session_name("Sinsay");
    session_start();
    
    require_once("tools/SuperController.php");
    $page="connexion";
    if(!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
    SuperController::callPage($page);
        
    ?>		
