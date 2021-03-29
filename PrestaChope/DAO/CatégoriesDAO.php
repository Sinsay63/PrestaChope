<?php

require_once ('tools/DataBaseLinker.php');
require_once('DTO/CatégoriesDTO.php');
require_once('DTO/SousCatégoriesDTO.php');

Class CatégoriesDAO {

    static function SearchAllCatégories_SousCatégories() {

        $bdd = DataBaseLinker::getConnexion();

        $reponse = $bdd->prepare("Select * from categories");
        $reponse->execute();
        $rep = $reponse->fetchAll();

        if (!empty($rep)) {
            $tab = [];
            foreach ($rep as $value) {

                $cate = new CatégoriesDTO();

                $cate->setId($value['Id']);
                $cate->setNom($value['nom']);
                $cate->setDescription($value['description']);

                $reponse = $bdd->prepare('Select * from souscategories where Id_Categories = ?');
                $reponse->execute(array($value['Id']));
                $scat = $reponse->fetchAll();

                    foreach ($scat as $sous_caté){
                        $souscat = new SousCatégoriesDTO();

                        $souscat->setId($sous_caté['Id']);
                        $souscat->setNom($sous_caté['nom']);
                        
                        $cate->setSouscatégories($souscat);
                    }
                $tab[] = $cate;
            }
            return $tab;
        } 
        else {
            return null;
        }
    }

}
