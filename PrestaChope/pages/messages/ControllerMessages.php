<?php

require_once('DAO/ContactDAO.php');

class ControllerMessages {

    function includeViewMessages() {
        require_once('Messages.php');
    }
    function changeStatutMessage($id,$statut){
        ContactDAO::changeStatusMessage($id, $statut);
    }
}
