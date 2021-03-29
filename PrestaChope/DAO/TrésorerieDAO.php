<?php
require_once ('tools/DataBaseLinker.php');
Class TrésorerieDAO{
    
    static function searchTresorerie(){
        $bdd= DataBaseLinker::getConnexion();
        
        $reponse=$bdd->prepare('Select Total from tresorerie');
        $reponse->execute();
        $montant=$reponse->fetch();
        $money=$montant['Total'];
        return $money;
    }
    static function addToTrésorerie($sous){
        
        $bdd= DataBaseLinker::getConnexion();
        
        $reponse=$bdd->prepare('Select Total from tresorerie');
        $reponse->execute();
        $montant=$reponse->fetch();
        
        $tresorerie=$montant['Total']+$sous;
        
        $state=$bdd->prepare('UPDATE tresorerie SET Total = ?');
        $state->execute(array($tresorerie));
    }
}