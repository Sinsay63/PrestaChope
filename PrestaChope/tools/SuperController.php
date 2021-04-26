<?php

Class SuperController {

    static function callPage($page) {
        switch ($page) {
            case 'inscription':
                require_once('pages/inscription/ControllerInscription.php');
                $register = new ControllerInscription();

                if (!empty($_POST['nom']) && !empty($_POST['prénom']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['email']) && !empty($_POST['age'])) {
                    $error = $register->registerUser($_POST['nom'], $_POST['prénom'], $_POST['email'], $_POST['age'], $_POST['pseudo'], $_POST['password'], $_POST['confirm_password']);
                    $register->redirect($error);
                } else {
                    $register->includeViewInscription();
                }
                break;


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


            case "deconnexion":
                require_once('DAO/DéconnexionDAO.php');
                $deconnexion = new DéconnexionDAO();
                if (!empty($_SESSION['ID'])) {

                    $déco = $deconnexion->déconnexion();
                    if ($déco) {
                        $deconnexion->redirect();
                    }
                } else {
                    $deconnexion->redirect();
                }
                break;


            case "accueil":
                require_once('pages/accueil/ControllerAccueil.php');
                $accueil = new ControllerAccueil();
                $accueil->includeViewAccueil();
                break;


            case "catalogue":
                require_once('pages/catalogue/ControllerCatalogue.php');
                $catalogue = new ControllerCatalogue();
                $catalogue->includeViewCatalogue();
                break;


            case "contact":
                require_once('pages/contact/ControllerContact.php');

                $contacter = new ControllerContact();
                $contacter->includeViewContact();

                if (!empty($_POST['contenu']) && !empty($_POST['type']) && !empty($_POST['idclient'])) {
                    $contact = new ContactDTO();
                    $contact->setContenu($_POST['contenu']);
                    $contact->setTypeDemande($_POST['type']);
                    $contact->setIdClients($_POST['idclient']);

                    $insert = $contacter->insertContactDemande($contact);
                    $contacter->redirect($insert);
                }
                break;


            case 'produits':
                require_once('pages/produits/ControllerProduits.php');
                $produits = new ControllerProduits();
                if (!empty($_GET['prod'])) {
                    $produits->includeViewProduits();
                    if (!empty($_FILES['image'])) {
                        $produits->modifImgProduit($_FILES['image']);
                    }
                    if (!empty($_POST['info']) && !empty($_POST['quoi'])) {
                        $produits->modifProduit($_POST['info'], $_POST['quoi']);
                    }
                }
                if (!empty($_GET['delete'])) {
                    $produits->deleteProduit();
                }
                break;

            case 'profil':
                if (!empty($_SESSION['ID'])) {
                    require_once('pages/profil/ControllerProfil.php');
                    $profil = new ControllerProfil();
                    $profil->viewProfil();

                    if (!empty($_GET['delete'])) {
                        $profil->deleteUser($_SESSION['ID']);
                    }
                    if (!empty($_POST['info']) && !empty($_POST['quoi'])) {
                        $profil->modifProfil($_SESSION['ID'], $_POST['info'], $_POST['quoi']);
                    }
                } else {
                    header('location: index.php?page=accueil');
                }
                break;
        }
    }

}
