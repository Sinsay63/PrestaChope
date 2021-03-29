<?php

require_once ('tools/DataBaseLinker.php');
require_once('DTO/ProduitsDTO.php');
Class ProduitsDAO {

    static function searchAllProducts() {

        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare('Select * from produits');
        $state->execute();
        $products = $state->fetchAll();

        if ($products) {
            $tab = [];
            foreach ($products as $prod) {
                $produit = new ProduitsDTO();

                $produit->setId($prod['Id']);
                $produit->setNom($prod['nom']);
                $produit->setDescription($prod['description']);
                $produit->setPrix($prod['prix']);
                $produit->setStock($prod['stock']);

                $tab[] = $produit;
            }
            return $tab;
        } else {
            return null;
        }
    }

    static function searchProductsByIdCatégories($id_catégorie) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('Select * from produits where Id_Catégories = ?');
        $state->execute(array($id_catégorie));
        $products = $state->fetchAll();

        if ($products) {
            $tab = [];
            foreach ($products as $prod) {
                $produit = new ProduitsDTO();

                $produit->setId($prod['Id']);
                $produit->setNom($prod['nom']);
                $produit->setDescription($prod['description']);
                $produit->setPrix($prod['prix']);
                $produit->setStock($prod['stock']);

                $tab[] = $produit;
            }
            return $tab;
        } else {
            return null;
        }
    }
    static function searchProductsByIdSousCatégories($id_souscatégorie) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('Select * from produits where Id_SousCatégories = ?');
        $state->execute(array($id_souscatégorie));
        $products = $state->fetchAll();

        if ($products) {
            $tab = [];
            foreach ($products as $prod) {
                $produit = new ProduitsDTO();

                $produit->setId($prod['Id']);
                $produit->setNom($prod['nom']);
                $produit->setDescription($prod['description']);
                $produit->setPrix($prod['prix']);
                $produit->setStock($prod['stock']);

                $tab[] = $produit;
            }
            return $tab;
        } else {
            return null;
        }
    }

}
