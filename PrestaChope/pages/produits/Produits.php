<html>
    <head>
        <title>page d'un produit</title>
        <link rel="stylesheet" href="assets/css/catalogue.css"/>
    </head>
    <body>
        <h1>Produits</h1>

        <?php
        if (!empty($_GET['prod'])) {
            $produit = ProduitsDAO::searchProductsById($_GET['prod']);
            ?>
            <div class="produits">
                <?php
                if ($produit != null) {
                    ?>
                    <div class="box_produit">
                        <div class="img_prod">
                            <img class="img_prod"src="<?php echo $produit->getImage(); ?>" alt="photo produit"/>
                        </div>
                        <div class="nom_prod">
                            <p><?php echo $produit->getNom(); ?></p>
                        </div>
                        <div class="descri_prod">
                            <p><?php echo $produit->getDescription() . '<br>'; ?></p>
                            <p> <?php echo 'Prix: ' . $produit->getPrix() . '€'; ?></p>
                        </div>
                    </div>
                    <?php
                }
             else {
                echo 'Aucun produit n\'a été trouvé.';
            }
            ?>
        </div>
        <?php
        }
        ?>
    </body>
</html>




