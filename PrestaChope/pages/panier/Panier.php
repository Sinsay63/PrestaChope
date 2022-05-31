<html>
    <head>
        <title>Panier</title>
        <link rel="stylesheet" href="assets/css/panier.css"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <main>
            <div class="panier">
                <h1>MON PANIER</h1>
                <?php
                if (!empty($_SESSION['ID']) && $_SESSION['IsAdmin'] == 0) {
                    $panier = ControllerPanier::getPanierByIdUser($_SESSION['ID']);
                    if ($panier != null) {
                        if (!empty($_GET['err'])) {
                            ?>
                            <h3>Le montant de votre cagnotte est insuffisant pour effectuer votre commande.</h3>
                            <?php
                        }
                        $user = UsersDAO::GetUserInfo($_SESSION['ID']);
                        ?>
                        <div class="text_solde">
                            <span>Votre solde est de <?php echo $user->getCagnotte(); ?>€</span>
                        </div>
                        <div class="text_article">
                            <br><?php foreach ($panier as $key => $value) { ?>
                                <div class="produit">
                                    <?php
                                    $produit = ProduitsDAO::searchProductsById($value->getIdproduit());
                                    $sommeProduit = $produit->getPrix()*$value->getQuantité();
                                    echo 'Article : x' . $value->getQuantité() .' '.$produit->getNom() . ' <br> Prix: ' . $sommeProduit . '€ ('.$produit->getPrix().'€ l\'unité).';
                                    ?>
                                    <br>
                                    <a href="index.php?page=deletePanier&del=<?php echo $value->getId() ?>" ><button style="margin-top:10px;">Supprimer du panier</button></a>
                                </div>

                            <?php } ?>
                        </div>
                        <div class="text_montant">
                            <p> Montant total du panier : <?php echo round(ControllerPanier::getMontantPanier($_SESSION['ID']),2) ?>€</p> <br>
                        </div>
                        <div class="text_commander">
                            <a href="index.php?page=commander"><button style="font">Commander</button></a>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <p>Votre panier est vide. Rendez vous sur notre <a href="index.php?page=catalogue">catalogue</a> pour choisir nos produits ! </p>
                        <?php
                    }
                }
                ?>
            </div>
        </main>
    </body>
</html>
