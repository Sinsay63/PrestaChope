<html>
    <head>
        <title>Panier</title>
    </head>
    <body>
        <?php
        if (!empty($_SESSION['ID'])) {
            $panier = ControllerPanier::getPanierByIdUser($_SESSION['ID']);
            if ($panier != null) {
                if(!empty($_GET['err'])){
                    ?>
        <script type="text/javascript">
        alert('VOUS N\'AVEZ PAS ASSEZ D\'ARGENT SUR VOTRE COMPTE !!!!! ');
            
        </script>
        <?php
                }
                $user= UsersDAO::GetUserInfo($_SESSION['ID']);
                echo 'Votre solde est de '.$user->getCagnotte().'€.<br><br>';
                echo 'Mon panier: <br><br>';
                foreach ($panier as $key => $value) {
                    $produit = ProduitsDAO::searchProductsById($value->getIdproduit());
                    echo 'Article : ' . $produit->getNom() . ' -> quantité : ' . $value->getQuantité().' à un prix de '.$produit->getPrix().'€ l\'unité.';
                    ?>
                    <a href="index.php?page=deletePanier&del=<?php echo $value->getId() ?>">Supprimer du panier</a>
                    <br><br>
                    <?php
                }
                ?>
                    <?php echo 'Le montant total du panier est de '. ControllerPanier::getMontantPanier($_SESSION['ID']).'€<br>';
                    ?><a href="index.php?page=commander">Commander</a>
                    <?php
            } else {
                echo 'Votre panier est vide.';
            }
        }
        ?>
    </body>
</html>
