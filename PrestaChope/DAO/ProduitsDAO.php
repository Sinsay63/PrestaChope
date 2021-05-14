<?php

require_once ('tools/DataBaseLinker.php');
require_once('DTO/ProduitsDTO.php');

Class ProduitsDAO {

    static function searchAllProducts() {

        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare('Select * from produits where Id_Categories > 1 and Id_SousCategories > 1 order by Id_Categories ASC');
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
                $produit->setImage($prod['image']);

                $tab[] = $produit;
            }
            return $tab;
        } else {
            return null;
        }
    }

    static function searchProductsById($id) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('Select * from produits where Id = ?');
        $state->execute(array($id));
        $prod = $state->fetch();

        if ($prod) {
            $produit = new ProduitsDTO();

            $produit->setId($prod['Id']);
            $produit->setNom($prod['nom']);
            $produit->setDescription($prod['description']);
            $produit->setPrix($prod['prix']);
            $produit->setStock($prod['stock']);
            $produit->setImage($prod['image']);

            return $produit;
        } else {
            return null;
        }
    }

    static function searchProductsByIdCatégories($id_catégorie) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('Select * from produits where Id_Categories = ?');
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
                $produit->setImage($prod['image']);

                $tab[] = $produit;
            }
            return $tab;
        } else {
            return null;
        }
    }

    static function searchProductsByIdSousCatégories($id_souscatégorie) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('Select * from produits where Id_SousCategories = ?');
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
                $produit->setImage($prod['image']);

                $tab[] = $produit;
            }
            return $tab;
        } else {
            return null;
        }
    }

    static function modifProduit($info, $quoi, $idProduit) {

        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare("UPDATE produits SET $quoi = ? where Id = ? ");
        $state->execute(array($info, $idProduit));
    }

    static function imgProduit($image) {
        $_FILES['image'] = $image;
        $dossier = 'assets/images/';
        $file = basename($_FILES['image']['name']);
        $taille_maxi = 10000000;
        $taille = filesize($_FILES['image']['tmp_name']);
        $extensions = array('.png', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['image']['name'], '.');
        $success = false;
        if (in_array($extension, $extensions)) {
            if ($taille < $taille_maxi) {
                $fich = strtr($file, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fich);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) {
                    $success = $dossier . $fichier;
                }
            }
        }
        return $success;
    }

    static function ModifImgProduit($image, $idProduit) {
        $bdd = DataBaseLinker::getConnexion();

        $upload = $bdd->prepare("UPDATE produits SET image = ? WHERE Id = ?");
        $img = self::imgProduit($image);
        if ($img) {

            $upload->execute(array($img, $idProduit));
        }
    }

    static function deleteProduit($idProduit) {
        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare("DELETE from produits WHERE Id = ?");
        $state->execute(array($idProduit));
    }

    static function addProduit($image, $nom, $description, $prix, $stock,$idcaté,$idsouscaté) {
        $bdd = DataBaseLinker::getConnexion();

        $img = self::imgProduit($image);
        if ($img) {
            $state = $bdd->prepare('INSERT INTO produits(nom,description,prix,stock,image,Id_Categories,Id_SousCategories) VALUES(?,?,?,?,?,?,?)');
            $state->execute(array($nom, $description, $prix, $stock, $img, $idcaté, $idsouscaté));
        }
    }

}
