<?php

Class SuperController {

    static function callPage($page) {

        switch ($page) {

            case 'inscription':
                require_once('pages/inscription/ControllerInscription.php');
                $register = new ControllerInscription();

                if (!empty($_POST['nom']) && !empty($_POST['prénom']) && !empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['email']) && !empty($_POST['age'])) {
                    $error = $register->registerUser($_POST['nom'], $_POST['prénom'], $_POST['email'], $_POST['age'], $_POST['pseudo'], $_POST['password'], $_POST['confirm_password']);
                    Rooter::redirectToPage('inscription&err=' . $error);
                } else {
                    $register->includeViewInscription();
                }
                break;


            case "connexion" :
                require_once("pages/connexion/ControllerConnexion.php");
                $connexion = new ControllerConnexion();

                if (!empty($_POST['pseudo']) && !empty($_POST[('password')])) {
                    if ($connexion->authenticate($_POST['pseudo'], $_POST['password'])) {
                        Rooter::redirectToPage('accueil');
                    }
                }
                $connexion->includeViewConnexion();
                break;


            case "deconnexion":
                if (!empty($_SESSION['ID'])) {
                    require_once('pages/déconnexion/ControllerDéconnexion.php');
                    $deconnexion = new ControllerDéconnexion();

                    $deconnexion->déconnexion();
                }
                Rooter::redirectToPage("accueil");

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
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 0) {
                    require_once('pages/contact/ControllerContact.php');
                    $contacter = new ControllerContact();

                    if (!empty($_POST['contenu']) && !empty($_POST['type']) && !empty($_POST['idclient'])) {
                        $contacter->insertContactDemande($_POST['contenu'], $_POST['type'], $_POST['idclient']);
                        Rooter::redirectToPage('accueil');
                    } else {
                        $contacter->includeViewContact();
                    }
                } else {
                    Rooter::redirectToPage("accueil");
                }
                break;


            case 'produits':
                require_once('pages/produits/ControllerProduits.php');
                $produits = new ControllerProduits();

                if (!empty($_GET['prod'])) {
                    $produits->includeViewProduits();
                } else {
                    Rooter::redirectToPage('catalogue');
                }

                break;


            case 'modifProduit':
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 1) {
                    require_once('pages/produits/ControllerProduits.php');
                    $produits = new ControllerProduits();

                    if (!empty($_GET['prod'])) {
                        $idprod = $_GET['prod'];

                        if (!empty($_FILES['image'])) {
                            $produits->modifImgProduit($_FILES['image'], $idprod);
                        }
                        if (!empty($_POST['info']) && !empty($_POST['quoi'])) {
                            $produits->modifProduit($_POST['info'], $_POST['quoi'], $idprod);
                        }
                        Rooter::redirectToPage("produits&prod=$idprod");
                    }
                }
                break;


            case 'deleteProduit':
                if (!empty($_SESSION['ID']) && !empty($_GET['prod'])) {
                    require_once('pages/produits/ControllerProduits.php');
                    $produits = new ControllerProduits();

                    $produits->deleteProduit($_GET['prod']);
                    Rooter::redirectToPage('catalogue');
                } else {
                    Rooter::redirectToPage("catalogue");
                }
                break;


            case 'créationProduit':
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 1) {
                    require_once('pages/produits/ControllerProduits.php');
                    $produits = new ControllerProduits();
                    
                    if (!empty($_FILES['image']) && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['stock']) && !empty($_POST['catégorie']) && !empty($_POST['sousCatégorie'])) {
                        $produits->addProduit($_FILES['image'], $_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['stock'],$_POST['catégorie'],$_POST['sousCatégorie']);
                        Rooter::redirectToPage("catalogue");
                    }
                    else{
                         $produits->includeViewCréaProduit();
                    }
                } 
                else {
                    Rooter::redirectToPage("catalogue");
                }
                break;


            case 'profil':
                if (!empty($_SESSION['ID']) || !empty($_GET['iduser'])) {
                    require_once('pages/profil/ControllerProfil.php');
                    $profil = new ControllerProfil();

                    $profil->viewProfil();
                } else {
                    Rooter::redirectToPage('accueil');
                }
                break;


            case 'modifProfil':
                if (!empty($_POST['info']) && !empty($_POST['type'])) {
                    require_once('pages/profil/ControllerProfil.php');
                    $profil = new ControllerProfil();

                    $modif = $profil->modifProfil($_SESSION['ID'], $_POST['info'], $_POST['type']);
                    if ($modif>0) {
                         Rooter::redirectToPage('profil&err='.$modif);
                    }
                }
                Rooter::redirectToPage('profil');
                break;


            case 'deleteProfil':
                if (!empty($_SESSION['ID']) && !empty($_GET['delete'])) {
                    require_once('pages/profil/ControllerProfil.php');
                    $profil = new ControllerProfil();

                    $profil->deleteUser($_GET['delete']);
                    Rooter::redirectToPage('profil');
                }
                else {
                    Rooter::redirectToPage('accueil');
                }
                break;


            case 'panier':
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 0) {
                    require_once ('pages/panier/ControllerPanier.php');
                    $panier = new ControllerPanier();

                    $panier->includePanier();
                } else {
                    Rooter::redirectToPage('accueil');
                }
                break;


            case 'ajoutPanier':
                if (!empty($_POST['quantité']) && !empty($_POST['produit']) && !empty($_SESSION['ID'])) {
                    require_once ('pages/panier/ControllerPanier.php');
                    $panier = new ControllerPanier();

                    $panier->addPanier($_POST['quantité'], $_POST['produit'], $_SESSION['ID']);
                    Rooter::redirectToPage('catalogue');
                } else {
                    Rooter::redirectToPage('accueil');
                }
                break;


            case 'deletePanier':
                if (!empty($_SESSION['ID']) && !empty($_GET['del'])) {
                    require_once ('pages/panier/ControllerPanier.php');
                    $panier = new ControllerPanier();

                    $panier->deletePanier($_GET['del']);
                    Rooter::redirectToPage('panier');
                }
                break;


            case 'commander':
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 0) {
                    require_once ('pages/commandes/ControllerCommandes.php');
                    $commande = new CommandesDAO();

                    $success = $commande->createCommand($_SESSION['ID']);
                    if ($success) {
                        Rooter::redirectToPage('catalogue');
                    } else {
                        Rooter::redirectToPage('panier&err=1');
                    }
                } else {
                    Rooter::redirectToPage('catalogue');
                }
                break;


            case 'listeUtilisateurs':
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 1) {
                    require_once('pages/utilisateurs/ControllerUtilisateurs.php');
                    $listUsers = new ControllerUtilisateurs();

                    $listUsers->includeViewUtilisateur();
                }
                break;


            case 'deleteUser':
                if (!empty($_SESSION['ID']) && !empty($_GET['id'])) {
                    require_once('pages/utilisateurs/ControllerUtilisateurs.php');
                    $listUsers = new ControllerUtilisateurs();

                    $listUsers->deleteUser($_GET['id']);
                    Rooter::redirectToPage('listeUtilisateurs');
                } else {
                    Rooter::redirectToPage('accueil');
                }
                break;

            case 'catégories':
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 1) {
                    require_once('pages/catégories/ControllerCatégories.php');
                    $catégories = new ControllerCatégories();

                    $catégories->includeViewCatégories();
                } else {
                    Rooter::redirectToPage('accueil');
                }
                break;


            case 'modifCatégorie':
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 1) {
                    require_once('pages/catégories/ControllerCatégories.php');
                    $modifCatégories = new ControllerCatégories();

                    if (!empty($_GET['caté'])) {
                        $modifCatégories->includeViewModifCatégorie();
                    }
                    if (!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['sousCaté']) && !empty($_POST['idCaté']) && !empty($_POST['idSousCaté'])) {
                        $modifCatégories->modifCatégorie($_POST['nom'], $_POST['description'], $_POST['sousCaté'], $_POST['idCaté'], $_POST['idSousCaté']);
                        Rooter::redirectToPage("catégories");
                    }
                } else {
                    Rooter::redirectToPage("accueil");
                }
                break;


            case 'deleteCatégorie':
                if (!empty($_SESSION['ID']) && !empty($_GET['id'])) {
                    require_once('pages/catégories/ControllerCatégories.php');
                    $catégories = new ControllerCatégories();

                    $catégories->deleteCatégorie($_GET['id']);
                    Rooter::redirectToPage("catégories");
                } else {
                    Rooter::redirectToPage("catalogue");
                }
                break;


            case 'créationCatégorie':
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 1) {
                    require_once('pages/catégories/ControllerCatégories.php');
                    $créaCatégories = new ControllerCatégories();

                    $créaCatégories->includeViewCréationCatégorie();

                    if (!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['sousCaté'])) {
                        $créaCatégories->créationCatégorie($_POST['nom'], $_POST['description'], $_POST['sousCaté']);
                        Rooter::redirectToPage("catégories");
                    }
                } else {
                    Rooter::redirectToPage("catalogue");
                }
                break;


            case 'messages':
                if (!empty($_SESSION['ID'])) {
                    require_once('pages/messages/ControllerMessages.php');
                    $messages = new ControllerMessages();

                    if (!empty($_GET['viewed']) && !empty($_GET['id'])) {
                        $messages->changeStatutMessage($_GET['id'], $_GET['viewed']);
                        Rooter::redirectToPage('messages');
                    }
                    $messages->includeViewMessages();
                } else {
                    Rooter::redirectToPage('accueil');
                }
                break;


            default:

                Rooter::redirectToPage("accueil");
                break;
        }
    }

}
