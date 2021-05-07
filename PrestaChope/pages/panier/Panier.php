<html>
    <head>
        <title>Panier</title>
    </head>
    <body>
        <?php
        if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 0) {
            $panier = ControllerPanier::getPanierByIdUser($_SESSION['ID']);
            if ($panier != null) {
                if (!empty($_GET['err'])) {
                    //Afficher montant cagnotte insuffisant
                }
                $user = UsersDAO::GetUserInfo($_SESSION['ID']);
                ?>
                <p>Votre solde est de <?php echo $user->getCagnotte(); ?>€</p>
                <br>
                <p>Mon panier:<p> <br><?php
                    foreach ($panier as $key => $value) {
                        $produit = ProduitsDAO::searchProductsById($value->getIdproduit());
                        echo 'Article : ' . $produit->getNom() . ' -> quantité : ' . $value->getQuantité() . ' à un prix de ' . $produit->getPrix() . '€ l\'unité.';
                        ?>
                        <a href="index.php?page=deletePanier&del=<?php echo $value->getId() ?>">Supprimer du panier</a>
                        <br><br>
          <?php } ?>
                <p> Le montant total du panier est de <?php echo ControllerPanier::getMontantPanier($_SESSION['ID']) ?>€.</p> <br>
                <a href="index.php?page=commander">Commander</a>
            <?php
            } 
            else {  ?>
                <p>Votre panier est vide </p>
                <?php
            }
        }
        ?>
    </body>
</html>
