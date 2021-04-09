<?php

require_once('DAO/UsersDAO.php');

class ControllerProfil {

    function viewProfil() {
        require_once ('Profil.php');
    }

    static function GetInfoUser($id) {
        $user = UsersDAO::GetUserInfo($id);
        return $user;
    }
    
    static function GetInfoClient($id){
        $client= UsersDAO::GetInfoClient($id);
        return $client;
        
    }
    function deleteUser($id){
        UsersDAO::deleteUser($id);
    } 
    function redirect(){
        header('location: index.php?page=accueil');
    }

}
