<?php
require_once ('tools/DataBaseLinker.php');
require_once('DTO/ContactDTO.php');

class ContactDAO{
    
    static function insertContactDemande($contact){
        
        $bdd= DataBaseLinker::getConnexion();
        $contenu=$contact->getContenu();
        $type=$contact->getTypeDemande();
        $idclient=$contact->getIdClients();
        $insert=false;
        
        $state=$bdd->prepare('INSERT INTO contact(contenu,type_demande,Id_Clients) VALUES (?,?,?)');
        $state->execute(array($contenu,$type,$idclient));
        $rep=$state->fetch();
        if($rep){
            $insert=true;
        }
        return $insert;
    }
}
