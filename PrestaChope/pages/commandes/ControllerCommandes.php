<?php

require_once('DAO/CommandesDAO.php');

class ControllerCommandes {

    function createCommand($id) {
        return CommandesDAO::createCommand($id);
    }
}
