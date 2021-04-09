<?php
require_once('DAO/UsersDAO.php');

class ControllerInscription {

    function includeViewInscription() {
        require_once('Inscription.php');
    }

    function registerUser($nom, $prénom, $email, $age, $pseudo, $password, $password2) {
        $register = UsersDAO::registerUser($nom, $prénom, $email, $age, $pseudo, $password, $password2);
        return $register;
    }

    function redirect($error) {
        if ($error == 0) {
                header("location: index.php?page=connexion");
        } else {
            header("location: index.php?page=inscription&error=$error");
        }
    }

}
