<?php

require_once('DAO/PanierDAO.php');

class ControllerPanier {

    function includePanier() {
        include_once ('DAO/ProduitsDAO.php');
        include_once('DAO/UsersDAO.php');
        include_once('Panier.php');
    }

    static function getPanierByIdUser($id) {
        return PanierDAO::getPanierByIdUser($id);
    }

     function addPanier($quantité, $idprod, $iduser) {
        PanierDAO::addPanier($quantité, $idprod, $iduser);
    }
    function deletePanier($id){
        PanierDAO::deletePanier($id);
    }
    static function getMontantPanier($id){
        return PanierDAO::getMontantPanier($id);
    }

}
