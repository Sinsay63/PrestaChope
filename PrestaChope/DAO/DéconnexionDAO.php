<?php

class DéconnexionDAO {

    function déconnexion() {
        if (session_destroy()) {
            return true;
        } else {
            return false;
        }
    }

    function redirect() {
        header('location: index.php?page=accueil');
    }

}
