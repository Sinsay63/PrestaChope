<?php

Class CatégoriesDAO{
    
    static function SearchAllCatégoriesAndSousCatégories(){
        
        $bdd= DataBaseLinker::getConnexion();
        
        $reponse=$bdd->prepare("Select cat.Id,cat.nom,scat.nom from categories as cat inner join souscategories as scat on scat.Id_Categories = cat.Id");
        $reponse->execute();
        $rep=$reponse->fetchAll();
        
        
    }
}

