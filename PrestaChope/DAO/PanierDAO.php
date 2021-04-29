<?php

require_once ('tools/DataBaseLinker.php');
require_once('DTO/PanierDTO.php');

class PanierDAO {

    static function getPanierByIdUser($id) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare("SELECT * from panier where Id_Users = ?");
        $state->execute(array($id));
        $contenu = $state->fetchAll();
        if ($contenu) {
            $tab = [];
            foreach ($contenu as $value) {
                $panier = new PanierDTO();
                $panier->setQuantité($value['quantité']);
                $panier->setIdproduit($value['Id_Produits']);
                $panier->setId($value['Id']);
                $tab[] = $panier;
            }
            return $tab;
        } else {
            return null;
        }
    }

    static function addPanier($quantité, $idprod, $iduser) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare("INSERT INTO panier(quantité,Id_Produits,Id_Users) VALUES(?,?,?)");
        $state->execute(array($quantité, $idprod, $iduser));
    }

    static function deletePanier($id) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare("DELETE from panier where Id = ?");
        $state->execute(array($id));
    }

    static function getMontantPanier($iduser) {
        $bdd = DataBaseLinker::getConnexion();

        $repons = $bdd->prepare('SELECT SUM(produits.prix * panier.quantité) from panier,produits where produits.Id = panier.Id_Produits and Id_Users = ? ');
        $repons->execute(array($iduser));
        $somme = $repons->fetch();
        return $somme[0];
    }

}
