<?php

require_once ('tools/DataBaseLinker.php');
require_once('DTO/ContactDTO.php');

class ContactDAO {

    static function insertContactDemande($contenu, $type, $idclient) {

        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare('INSERT INTO contact(date,contenu,type_demande,is_viewed,Id_Clients) VALUES (CURRENT_TIMESTAMP,?,?,?,?)');
        $state->execute(array($contenu,0, $type, $idclient));
    }

    static function getAllMessages() {
        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare('SELECT * from contact');
        $state->execute();
        $messages = $state->fetchAll();

        if ($messages !== null) {
            $tab = [];
            foreach ($messages as $value) {
                $msg = new ContactDTO();
                
                $msg->setId($value['Id']);
                $msg->setContenu($value['contenu']);
                $msg->setDate($value['date']);
                $msg->setTypeDemande($value['type_demande']);
                $msg->setIsViewed($value['is_viewed']);
                $msg->setIdClients($value['Id_Clients']);

                $tab[] = $msg;
            }
            return $tab;
        }
        return null;
    }

    static function getMessagesByIdClients($id) {
        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare('SELECT * from contact where Id_Clients = ?');
        $state->execute(array($id));
        $messages = $state->fetchAll();

        if ($messages !== null) {
            $tab = [];
            foreach ($messages as $value) {
                $msg = new ContactDTO();

                $msg->setContenu($value['contenu']);
                $msg->setDate($value['date']);
                $msg->setTypeDemande($value['type_demande']);
                $msg->setIsViewed($value['is_viewed']);
                $msg->setIdClients($value['Id_Clients']);

                $tab[] = $msg;
            }
            return $tab;
        }
        return null;
    }

    static function changeStatusMessage($id, $statut) {
        $bdd = DataBaseLinker::getConnexion();
        
        if($statut>1){
            $statut=0;
        }
        $state = $bdd->prepare('UPDATE contact SET is_viewed = ? WHERE Id = ?');
        $state->execute(array($statut,$id));
    }

}
