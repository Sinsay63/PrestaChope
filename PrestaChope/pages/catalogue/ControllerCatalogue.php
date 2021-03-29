<?php
require_once('DAO/Produits.php');
class ControllerCatalogue{
    
    function includeVIewCatalogue(){
        require_once('Catalogue.php');
    }
    static function searchAllProducts(){
        $produit= ProduitsDAO::searchAllProducts();
        return $produit;
    }
    static function searchProductsByIdCatégorie($id){
        $produit= ProduitsDAO::searchProductsByIdCatégories($id);
        return $produit;
    }
    static function searchProductsByIdSousCatégorie($id){
        $produit= ProduitsDAO::searchProductsByIdSousCatégories($id);
        return $produit;
    }
}

