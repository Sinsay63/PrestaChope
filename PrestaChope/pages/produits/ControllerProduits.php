<?php

require_once('DAO/ProduitsDAO.php');
class ControllerProduits {

    function includeViewProduits() {
        require_once('DAO/UsersDAO.php');
        require_once('Produits.php');
        
    }

    function modifImgProduit($image) {
        ProduitsDAO::modifImgProduit($image);
    }

    function modifProduit($info,$quoi) {
        ProduitsDAO::modifProduit($info, $quoi);
    }
    function deleteProduit() {
        ProduitsDAO::deleteProduit();
    }

}
