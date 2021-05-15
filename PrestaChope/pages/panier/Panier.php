<html>
    <head>
        <title>Panier</title>
        <link rel="stylesheet" href="assets/css/panier.css"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
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
                <div class="text_solde">
                    <p>Votre solde est de <?php echo $user->getCagnotte(); ?>€</p>
                </div>
                <br>
                <div class="text_panier">
                <p>Mon panier :
                </div>
                <div class="text_article">
                 <p> <br><?php

                    foreach ($panier as $key => $value) {
                        $produit = ProduitsDAO::searchProductsById($value->getIdproduit());
                        echo 'Article : ' . $produit->getNom() . ' ; quantité : ' . $value->getQuantité() . ' à un prix de ' . $produit->getPrix() . '€ l\'unité.';
                        ?>
                        <a href="index.php?page=deletePanier&del=<?php echo $value->getId() ?>">Supprimer du panier</a>
                        <br><br>
                </div>

          <?php } ?>
                <div class="text_montant">
                    <p> Le montant total du panier est de <?php echo ControllerPanier::getMontantPanier($_SESSION['ID']) ?>€.</p> <br>
                </div>
                <div class="text_commander">
                    <a href="index.php?page=commander">Commander</a>
                </div>
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
