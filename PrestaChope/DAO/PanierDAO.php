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
                $panier->setQuantité($value['quantite']);
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
        
        $state = $bdd->prepare("SELECT quantite from panier where Id_Produits = ?");
        $state->execute(array($idprod));
        $pres = $state->fetch();
        
        if($pres){
            $quant= $quantité+ $pres[0];
            $stat = $bdd->prepare("UPDATE panier SET quantite = ?  WHERE Id_Produits = ?");
            $stat->execute(array($quant, $idprod));
            
        }
        else {
            $stat = $bdd->prepare("INSERT INTO panier(quantite,Id_Produits,Id_Users) VALUES(?,?,?)");
            $stat->execute(array($quantité, $idprod, $iduser));
        }
        
    }

    static function deletePanier($id) {
        $bdd = DataBaseLinker::getConnexion();

        $state = $bdd->prepare("DELETE from panier where Id = ?");
        $state->execute(array($id));
    }

    static function getMontantPanier($iduser) {
        $bdd = DataBaseLinker::getConnexion();

        $repons = $bdd->prepare('SELECT SUM(produits.prix * panier.quantite) from panier,produits where produits.Id = panier.Id_Produits and Id_Users = ? ');
        $repons->execute(array($iduser));
        $somme = $repons->fetch();
        return $somme[0];
    }

}
