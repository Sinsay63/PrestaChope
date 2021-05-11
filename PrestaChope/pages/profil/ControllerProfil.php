<?php

require_once('DAO/UsersDAO.php');

class ControllerProfil {

    function viewProfil() {
        require_once ('Profil.php');
    }

    static function getInfoUser($id) {
        $user = UsersDAO::getUserInfo($id);
        return $user;
    }

    static function getInfoClient($id) {
        $client = UsersDAO::getInfoClient($id);
        return $client;
    }

    function deleteUser($id) {
        UsersDAO::deleteUser($id);
    }


    function modifProfil($idUser, $info, $quoi) {
        return UsersDAO::modifProfil($idUser, $info, $quoi);
    }
}
