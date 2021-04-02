<?php

Class SuperController {

    static function callPage($page) {
        switch ($page) {
            case "connexion" :
                require_once("pages/connexion/ControllerConnexion.php");

                $connexion = new ControllerConnexion();
                $connexion->includeViewConnexion();
                if (!empty($_POST['pseudo']) && !empty($_POST[('password')])) {
                    $auth = $connexion->authenticate($_POST['pseudo'], $_POST['password']);
                    if ($auth) {
                        $connexion->redirectUser();
                    }
                }
                break;

            case "accueil":
                require_once('pages/accueil/ControllerAccueil.php');
                $accueil = new ControllerAccueil();
                $accueil->includeViewAccueil();
                break;

            case "catalogue":
                require_once('pages/catalogue/ControllerCatalogue.php');
                ControllerCatalogue::includeViewCatalogue();
        }
    }

}
