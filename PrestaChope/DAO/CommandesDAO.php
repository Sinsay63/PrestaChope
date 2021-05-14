<?php

require_once ('tools/DataBaseLinker.php');
require_once('pages/panier/ControllerPanier.php');
require_once('DAO/UsersDAO.php');
require_once('DTO/ProduitsDTO.php');
require_once('DTO/CommandesDTO.php');

class CommandesDAO {

    static function createCommand($id) {
        $bdd = DataBaseLinker::getConnexion();
        $pan = new ControllerPanier();

        $panier = $pan->getPanierByIdUser($id);
        if ($panier != null) {
            $montantPanier = $pan->getMontantPanier($id);
            $cagnotte = UsersDAO::GetUserInfo($id)->getCagnotte();
            if ($montantPanier < $cagnotte) {
                $state = $bdd->prepare('INSERT INTO commandes(Id_Clients) VALUES(?) ');
                $state->execute(array($id));
                $lastId = $bdd->lastInsertId();

                foreach ($panier as $value) {
                    $reponse = $bdd->prepare('INSERT INTO produits_commandes(Id_Produits,Id_Commandes,quantites) VALUES(?,?,?) ');
                    $reponse->execute(array($value->getIdproduit(), $lastId, $value->getQuantité()));

                    $state = $bdd->prepare('UPDATE produits SET stock = stock - ? WHERE Id = ? ');
                    $state->execute(array($value->getQuantité(), $value->getIdproduit()));
                }

                $repons = $bdd->prepare('SELECT SUM(produits.prix * produits_commandes.quantites) from produits_commandes,produits WHERE produits.Id = produits_commandes.Id_Produits and Id_Commandes=? ');
                $repons->execute(array($lastId));
                $somme = $repons->fetch();

                $repon = $bdd->prepare('INSERT INTO factures(Id_Commandes,montant,date) VALUES(?,?,CURRENT_TIMESTAMP) ');
                $repon->execute(array($lastId, $somme[0]));

                $repo = $bdd->prepare('DELETE from panier where Id_Users = ?');
                $repo->execute(array($id));

                $rep = $bdd->prepare('UPDATE users SET cagnotte = ? where Id = ?');
                $rep->execute(array($cagnotte - $montantPanier, $id));
                return true;
            } else {
                return false;
            }
        }
    }

    static function getAllCommandesByIdClient($id) {
        $bdd = DataBaseLinker::getConnexion();


        $state = $bdd->prepare('SELECT fact.Id,fact.montant,fact.date from  commandes as cmd inner join factures as fact on cmd.Id = fact.Id_Commandes WHERE cmd.Id_Clients = ? GROUP BY fact.Id');
        $state->execute(array($id));
        $fact = $state->fetchAll();
        if ($fact) {
            $listeCommandes = [];
            foreach ($fact as $value) {
                $commande = new CommandesDTO();
                $stat = $bdd->prepare('SELECT pro_cmd.quantites,prod.nom,prod.prix from  commandes as cmd inner join factures as fact on cmd.Id = fact.Id_Commandes inner join produits_commandes as pro_cmd on pro_cmd.Id_Commandes = cmd.Id inner join produits as prod on prod.Id = pro_cmd.Id_Produits where fact.Id = ?');
                $stat->execute(array($value['Id']));
                $cmd = $stat->fetchAll();
                
                $listeProduits = [];
                
                foreach ($cmd as $produit) {
                    $prod = new ProduitsDTO();

                    $prod->setNom($produit['nom']);
                    $prod->setPrix($produit['prix']);
                    $prod->setStock($produit['quantites']);

                    $listeProduits[] = $prod;
                }

                $commande->setIdFacture($value['Id']);
                $commande->setListeProduits($listeProduits);
                $commande->setMontant($value['montant']);
                $commande->setDate($value['date']);
                $commande->setIdClients($id);

                $listeCommandes[] = $commande;
            }
            return $listeCommandes;
        }
        return null;
    }

}
