<?php
require_once('DAO/ContactDAO.php');
require_once('DTO/ContactDTO.php');

class ControllerContact{
    
    function includeViewContact(){
        require_once('Contact.php');
    }
    
    function insertContactDemande($contenu,$type,$idclient) {
        $insert= ContactDAO::insertContactDemande($contenu,$type,$idclient);
        return $insert;
    }
}
