<?php

require_once('DAO/UsersDAO.php');

Class ControllerConnexion {

    function includeViewConnexion() {
        require('Connexion.php');
    }

    function authenticate($pseudo, $password) {
        $user = UsersDAO::CheckUsers($pseudo, $password);
        if ($user != null) {
            $_SESSION['ID'] = $user->getId();
            $_SESSION['IsAdmin'] = $user->getIsAdmin();
            return true;
        } else {
            return false;
        }
    }

    function redirectUser() {
        header('location: index.php?page=accueil');
        exit;
    }

    static function GetUserInfo($id) {
        $user = UsersDAO::GetUserInfo($id);
        return $user;
    }

}
