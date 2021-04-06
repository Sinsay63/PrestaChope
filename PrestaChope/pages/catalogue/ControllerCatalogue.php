<?php

require_once('DAO/ProduitsDAO.php');
require_once ('DAO/CatégoriesDAO.php');
class ControllerCatalogue {

    function includeViewCatalogue() {
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

    static function searchCatégoriesSousCatégories(){
        $caté= CatégoriesDAO::SearchAllCatégories_SousCatégories();
        return $caté;
    }
    static function searchSousCatégories($id) {
        $sous_caté= CatégoriesDAO::SearchSousCatégories($id);
        return $sous_caté;
    }
}
