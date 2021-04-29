<?php

require_once ('tools/DataBaseLinker.php');

class CommandesDAO {

    static function createCommand($id) {
        require_once('pages/panier/ControllerPanier.php');
        require_once('DAO/UsersDAO.php');
        $bdd = DataBaseLinker::getConnexion();
        $pan = new ControllerPanier();

        $panier = $pan->getPanierByIdUser($id);
        if ($panier != null) {
            $montantPanier = $pan->getMontantPanier($id);
            $cagnotte=UsersDAO::GetUserInfo($id)->getCagnotte();
            if ($montantPanier < $cagnotte ) {
                $state = $bdd->prepare('INSERT INTO commandes(Id_Clients) VALUES(?) ');
                $state->execute(array($id));
                $lastId = $bdd->lastInsertId();

                foreach ($panier as $value) {
                    $reponse = $bdd->prepare('INSERT INTO produits_commandes(Id_Produits,Id_Commandes,quantites) VALUES(?,?,?) ');
                    $reponse->execute(array($value->getIdproduit(), $lastId, $value->getQuantité()));
                }

                $repons = $bdd->prepare('SELECT SUM(produits.prix * produits_commandes.quantites) as somme from produits_commandes,produits where produits.Id = produits_commandes.Id_Produits and Id_Commandes=? ');
                $repons->execute(array($lastId));
                $somme = $repons->fetch();

                $repon = $bdd->prepare('INSERT INTO factures(Id_Commandes,montant) VALUES(?,?) ');
                $repon->execute(array($lastId, $somme[0]));

                $repo = $bdd->prepare('DELETE from panier where Id_Users = ?');
                $repo->execute(array($id));

                $rep = $bdd->prepare('UPDATE users SET cagnotte = ? where Id = ?');
                $rep->execute(array($cagnotte-$montantPanier,$id));
            }
            else{
                return false;
            }
        }
    }
}
