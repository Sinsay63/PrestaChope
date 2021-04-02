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
                break;
            
            case "contact":
                require_once('pages/contact/ControllerContact.php');
            
                $contact = new ControllerContact();
                $contact->includeViewContact();
                
                if(!empty($_POST['contenu']) && !empty($_POST['type']) && !empty($_POST['idclient'])){
                    $insert=$contact->insertContactDemande($_POST['contenu'], $_POST['type'], $_POST['idclient']);
                    $contact->redirect($insert);
                }
        }
    }
}
