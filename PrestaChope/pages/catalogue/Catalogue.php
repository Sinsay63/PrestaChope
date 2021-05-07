<html>
    <head>
        <title>Catalogue</title>
        <script src="assets/js/script.js" type="text/javascript" async></script>
        <link rel="stylesheet" href="assets/css/catalogue.css"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Spartan:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>CATALOGUE</h1>
        <div class="cata_container">
            <?php
            if (!empty($_SESSION['ID'])) {
                if ($_SESSION['IsAdmin'] == 1) {
                    ?>
                    <a href="index.php?page=créationProduit">Ajouter un produit</a><br>
                    <a href="index.php?page=catégories">Gestion des catégories</a>
                <?php
                }
            } ?>
            <div class="choix_cat">
                <select class="cat_menu" name="cat_menu" onChange="redirige(this.value)" > <?php
                    if (!empty($_GET['cat'])) {
                        $cat = ControllerCatalogue::SearchCatégoriesByIdAndSousCatégories($_GET['cat']);
                        ?>
                        <option value="" hidden><?php echo $cat->getNom(); ?></option>
                    <?php } else {
                        ?>
                        <option value="" hidden>Recherche de catégories</option>
                    <?php } ?>
                    <?php if (!empty($_GET['cat'])) { ?>
                        <option value="0" >Toutes les catégories</option>
                        <?php
                    }
                    $cat = ControllerCatalogue::searchCatégoriesSousCatégories();
                    if ($cat != null) {
                        foreach ($cat as $caté) {
                            ?>
                            <option value="<?php echo $caté->getId(); ?>"><?php echo $caté->getNom(); ?></option>
                    <?php }
                }
                ?>
                </select>
                <?php
                if (!empty($_GET['cat'])) {
                    $scat = ControllerCatalogue::searchSousCatégories($_GET['cat']);
                    if ($scat != null) { ?>
                        <script>
                            let vars = <?php echo json_encode($_GET['cat']); ?>;
                        </script>
                        <select onChange="redirige2(this.value, vars)">
                            <?php
                            if (!empty($_GET['souscat'])) { 
                            $souscaté= ControllerCatalogue::SearchSousCatégorieById($_GET['souscat']); ?>
                            <option value="" hidden><?php echo $souscaté->getNom()  ; ?></option>
                            <?php
                            } 
                            else { ?>
                                <option value="" hidden>Recherche de sous catégories</option>
                            <?php
                            }
                            foreach ($scat as $sous_caté) {
                                ?>
                                <option value="<?php echo $sous_caté->getId(); ?>"><?php echo $sous_caté->getNom(); ?></option>
                      <?php } ?>
                        </select>
            <?php   }
                } ?>
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
                                            <a href="index.php?page=produits&prod=<?php echo $produit->getId(); ?>">
                                            <img class="img_prod"src="<?php echo $produit->getImage(); ?>" alt="photo produit"/></a>
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
                } else {
                    echo 'Aucun produit n\'a été trouvé.';
                }
                ?>
            </div>
        </div>
    </body>
</html>


