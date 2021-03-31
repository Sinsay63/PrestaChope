<?php
    require_once ('tools/DataBaseLinker.php');
class FacturesDAO{
    
    static function TotalTresorerie(){
        $bdd= DataBaseLinker::getConnexion();
        
        $reponse=$bdd->prepare('Select SUM(montant) from factures');
        $reponse->execute();
        $montant=$reponse->fetch();
        $money=$montant[0];
        return $money;
    }
}
