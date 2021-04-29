<?php

require_once('DAO/ProduitsDAO.php');
class ControllerProduits {

    function includeViewProduits() {
        require_once('DAO/UsersDAO.php');
        require_once('Produits.php');
        
    }
    
    function includeViewCréaProduit(){
        require_once('CréationProduit.php');
    }

    function  modifImgProduit($image,$id) {
        ProduitsDAO::modifImgProduit($image,$id);
    }

    function modifProduit($info,$quoi,$id) {
        ProduitsDAO::modifProduit($info, $quoi,$id);
    }
    function deleteProduit($id) {
        ProduitsDAO::deleteProduit($id);
    }
    function addProduit($image,$nom, $description, $prix, $stock){
        ProduitsDAO::addProduit($image, $nom, $description, $prix, $stock);
    }
}
