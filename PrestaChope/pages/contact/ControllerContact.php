<?php
require_once('DAO/ContactDAO.php');
require_once('DTO/ContactDTO.php');

class ControllerContact{
    
    function includeViewContact(){
        require_once('Contact.php');
    }
    
    function insertContactDemande($contact) {
        $insert= ContactDAO::insertContactDemande($contact);
        return $insert;
    }
    
    function redirect($insert){
        if($insert){
        header("location: index.php?page=contact&sent=yes");
        }
        else{
            header("location: index.php?page=contact&sent=no");
        }
    }
}
