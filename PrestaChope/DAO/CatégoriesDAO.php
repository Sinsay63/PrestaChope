<?php

require_once('tools/DataBaseLinker.php');
require_once('DTO/CatégoriesDTO.php');
require_once('DTO/SousCatégoriesDTO.php');

Class CatégoriesDAO {

    static function SearchAllCatégories_SousCatégories() {
        $bdd = DataBaseLinker::getConnexion();

        $reponse = $bdd->prepare("Select * from categories where Id >1");
        $reponse->execute();
        $rep = $reponse->fetchAll();

        if (!empty($rep)) {
            $tab = [];
            foreach ($rep as $value) {
                $cate = new CatégoriesDTO();

                $cate->setId($value['Id']);
                $cate->setNom($value['nom']);
                $cate->setDescription($value['description']);
                $scaté = self::SearchSousCatégories($value['Id']);
                $cate->setSouscatégories($scaté);
                $tab[] = $cate;
            }
            return $tab;
        } else {
            return null;
        }
    }

    static function SearchSousCatégories($id) {
        $bdd = DataBaseLinker::getConnexion();

        $reponse = $bdd->prepare('Select * from souscategories where Id_Categories = ?');
        $reponse->execute(array($id));
        $scat = $reponse->fetchAll();

        if ($scat) {
            $tab = [];
            foreach ($scat as $sous_caté) {
                $souscat = new SousCatégoriesDTO();

                $souscat->setId($sous_caté['Id']);
                $souscat->setNom($sous_caté['nom']);
                $tab[] = $souscat;
            }
            return $tab;
        } else {
            return null;
        }
    }

    static function SearchSousCatégorieById($id) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('SELECT * from souscategories where Id= ?');
        $state->execute(array($id));
        $souscatégorie = $state->fetch();

        $souscat = new SousCatégoriesDTO();

        $souscat->setId($souscatégorie['Id']);
        $souscat->setNom($souscatégorie['nom']);
        return $souscat;
    }

    static function SearchCatégoriesByIdAndSousCatégories($id) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('SELECT * from categories where Id= ?');
        $state->execute(array($id));
        $catégorie = $state->fetchAll();

        $cate = new CatégoriesDTO();
        foreach ($catégorie as $cat) {
            $cate->setId($cat['Id']);
            $cate->setNom($cat['nom']);
            $cate->setDescription($cat['description']);
            $scaté = self::SearchSousCatégories($cat['Id']);
            $cate->setSouscatégories($scaté);
        }
        return $cate;
    }

    static function modifCatégorie($nom, $description, $souscaté, $idcaté, $idsouscaté) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('UPDATE categories SET nom = ?, description = ? where Id = ?');
        $state->execute(array($nom, $description, $idcaté));

        for ($i = 0; $i < count($souscaté); $i++) {
            if ($idsouscaté[$i] == 0 && $souscaté[$i] != '') {
                $state = $bdd->prepare('INSERT INTO souscategories(nom,Id_Categories) VALUES(?,?) ');
                $state->execute(array($souscaté[$i], $idcaté));
            } else if ($idsouscaté[$i] != 0 && $souscaté[$i] != '') {
                $state = $bdd->prepare('UPDATE souscategories SET nom = ? where Id = ? ');
                $state->execute(array($souscaté[$i], $idsouscaté[$i]));
            }
        }
    }

    static function créationCatégorie($nom, $description, $sousCaté) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('INSERT INTO categories SET nom = ?, description = ? ');
        $state->execute(array($nom, $description));
        $lastid = $bdd->lastInsertId();
        foreach ($sousCaté as $value) {
            $state = $bdd->prepare('INSERT INTO souscategories(nom,Id_Categories) VALUES(?,?) ');
            $state->execute(array($value, $lastid));
        }
    }

    static function deleteCatégorie($id) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare('UPDATE produits SET Id_Categories = 1,Id_SousCategories = 1 where Id_Categories = ?');
        $state->execute(array($id));

        $stat = $bdd->prepare('delete from souscategories where Id_Categories= ?');
        $stat->execute(array($id));

        $states = $bdd->prepare('delete from categories where Id= ?');
        $states->execute(array($id));
    }

}
