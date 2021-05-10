<?php

require_once ('tools/DataBaseLinker.php');
require_once('DTO/ContactDTO.php');

class ContactDAO {

    static function insertContactDemande($contenu, $type, $idclient) {

        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare('INSERT INTO contact(contenu,type_demande,Id_Clients) VALUES (?,?,?)');
        $state->execute(array($contenu, $type, $idclient));
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

                $msg->setContenu($value['contenu']);
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
                $msg->setTypeDemande($value['type_demande']);
                $msg->setIsViewed($value['is_viewed']);
                $msg->setIdClients($value['Id_Clients']);

                $tab[] = $msg;
            }
            return $tab;
        }
        return null;
    }

}
