<html>
    <head>
        <title>Catalogue</title>
        <script>
            function redirige(myvalue) {
                if (myvalue > 0) {
                    window.location.assign("index.php?page=catalogue&cat=" + myvalue);
                } else {
                    window.location.assign("index.php?page=catalogue");
                }
            }
            function redirige2(myvalue, id) {
                window.location.assign("index.php?page=catalogue&cat=" + id + "&souscat=" + myvalue);
            }
        </script>
        <link rel="stylesheet" href="assets/css/catalogue.css"/>
    </head>
    <body>
        <h1>CATALOGUE</h1>
        <div class="cata_container">
            <div class="choix_cat">
                <select class="cat_menu" name="cat_menu" onChange="redirige(this.value)" >
                    <option value="" hidden>Recherche de catégories</option>
                    <?php if (!empty($_GET['cat'])) {
                        ?>
                        <option value="0" >Toutes les catégories</option>
                        <?php
                    } else {
                        ?>

                        <?php
                    }
                    $cat = ControllerCatalogue::searchCatégoriesSousCatégories();
                    if ($cat != null) {
                        foreach ($cat as $caté) {
                            ?>
                            <option value="<?php echo $caté->getId(); ?>"><?php echo $caté->getNom(); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <?php
                if (!empty($_GET['cat'])) {
                    $scat = ControllerCatalogue::searchSousCatégories($_GET['cat']);
                    if ($scat != null) {
                        ?>
                        <script>
                            let vari = <?php echo json_encode($_GET['cat']); ?>;
                        </script>
                        <select onChange="redirige2(this.value, vari)">
                            <option value="" hidden>Recherche de sous catégories</option>
                            <?php foreach ($scat as $sous_caté) { ?>
                                <option value="<?php echo $sous_caté->getId(); ?>"><?php echo $sous_caté->getNom(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="produits">
                <?php
                $produits = ControllerCatalogue::searchAllProducts();
                if (!empty($_GET['cat'])) {
                    $produits = ControllerCatalogue::searchProductsByIdCatégorie($_GET['cat']);
                    if (!empty($_GET['souscat'])) {
                        $produits = ControllerCatalogue::searchProductsByIdSousCatégorie($_GET['souscat']);
                    }
                }

                if ($produits != null) {
                    foreach ($produits as $produit) {
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
                }
                else{
                    echo 'Aucun produit n\'a été trouvé.';
                }
                ?>
            </div>
        </div>
    </body>
</html>


