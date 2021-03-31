    <?php
    session_name("Sinsay");
    session_start();
    require_once ('DAO/FacturesDAO.php');
    
    require_once("tools/SuperController.php");
    
    echo FacturesDAO::TotalTresorerie();
    
    if(!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
    SuperController::callPage($page);
        
    ?>		
