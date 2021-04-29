<?php

require_once ('tools/DataBaseLinker.php');
require_once('DTO/ContactDTO.php');

class ContactDAO {

    static function insertContactDemande($contenu, $type, $idclient) {

        $bdd = DataBaseLinker::getConnexion();
        $state = $bdd->prepare('INSERT INTO contact(contenu,type_demande,Id_Clients) VALUES (?,?,?)');
        $state->execute(array($contenu, $type, $idclient));
    }

}
