<?php

require_once('DAO/ProduitsDAO.php');

class ControllerCatalogue {

    static function includeViewCatalogue() {
        require('DAO/CatégoriesDAO.php');
        require_once('Catalogue.php');
    }

    static function searchAllProducts() {
        $produit = ProduitsDAO::searchAllProducts();
        return $produit;
    }

    static function searchProductsByIdCatégorie($id) {
        $produit = ProduitsDAO::searchProductsByIdCatégories($id);
        return $produit;
    }

    static function searchProductsByIdSousCatégorie($id) {
        $produit = ProduitsDAO::searchProductsByIdSousCatégories($id);
        return $produit;
    }

}
