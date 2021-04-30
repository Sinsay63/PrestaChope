<?php

require_once('DAO/UsersDAO.php');

class ControllerUtilisateurs {

    function includeViewUtilisateur() {
        include_once('Utilisateurs.php');
    }

    static function getAllUsers() {
        return UsersDAO::getAllUsers();
    }
    function deleteUser($id){
        UsersDAO::deleteUser($id);
    }
}
