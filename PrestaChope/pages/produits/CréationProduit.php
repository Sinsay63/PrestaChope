<html>
    <head>
        <title>Création d'un produit</title>

        <link rel="stylesheet" type="text/css" href="assets/css/creationproduit.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <script src="assets/js/produits.js" type="text/javascript" async></script>
    </head>
    <body>
        <h1>
            CHOIX DE LA CATÉGORIE ET DE LA SOUS-CATÉGORIE:
        </h1>
        <div class="erreurCate">
            <?php
            if (isset($_POST['nom']) && empty($_POST['sousCatégorie'])) {
            ?>
            <span>Veuillez sélectionner une catégorie.</span>
            <?php
            }
            ?>
        </div>
        <form action="index.php?page=créationProduit" method="post" enctype="multipart/form-data">
            <?php
            require_once('DAO/CatégoriesDAO.php');
            ?>
            <div class="opt">
                <input type="hidden" name="catégorie" value="<?php echo $_GET['cat']; ?>">
                <select class="selectCate" onChange="redirige(this.value)" > <?php
                    if (!empty($_GET['cat'])) {
                        $cat = CatégoriesDAO::SearchCatégoriesByIdAndSousCatégories($_GET['cat']);
                        ?>
                        <option value="" hidden><?php echo $cat->getNom(); ?></option>
                        <?php
                    }
                    else {
                        ?>
                        <option value="" hidden>Recherche de catégories</option>
                    <?php }
                    ?>
                    <?php if (!empty($_GET['cat'])) { ?>
                        <option value="0" >Toutes les catégories</option>
                        <?php
                    }
                    $cat = CatégoriesDAO::SearchAllCatégories_SousCatégories();
                    if ($cat != null) {
                        foreach ($cat as $caté) {
                            ?>
                            <option value="<?php echo $caté->getId(); ?>"><?php echo $caté->getNom(); ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>  
            <?php
            if (!empty($_GET['cat'])) {
                $scat = CatégoriesDAO::searchSousCatégories($_GET['cat']);
                if ($scat != null) {
                    ?>
                    <div class="opt2">
                        <select class="selectCate" name="sousCatégorie" required>
                            <?php
                            if (!empty($_GET['souscat'])) {
                                $souscaté = CatégoriesDAO::SearchSousCatégorieById($_GET['souscat']);
                                ?>

                                <option value="" hidden><?php echo $souscaté->getNom(); ?></option>
                                <?php
                            }
                            else {
                                ?>
                                <option value="" hidden>Recherche de sous catégories</option>
                                <?php
                            }
                            foreach ($scat as $sous_caté) {
                                ?>
                                <option value="<?php echo $sous_caté->getId(); ?>"><?php echo $sous_caté->getNom(); ?></option>
                            <?php } ?>
                    </div>
                </select>

                <?php
            }
        }
        ?>
        <div class="all">
            <div class="nom_prod">
                <div class="nom">
                    Nom :
                </div>
                <input type="text" name="nom" required/>
            </div>
            <div class="descri_prod">
                <div class="descri">
                    Description:
                </div>
                <textarea type="text" name="description" cols="25" rows="3" required></textarea>
            </div>
            <div class="prix_prod">
                <div class="prix">
                    Prix:
                </div>
                <input type="number" name="prix" required min="1"/>
            </div>
            <div class="stock_prod">
                <div class="stock">
                    Stock:
                </div>
                <input type="number" name="stock" required min="0"/>
            </div>
            <br>
            <input type="file" name="image" required id=btn_ajproduit><br><br>
            <input type="submit" value="Créer le produit" id=btn_creprod>
        </div>
    </form>
</body>
</html>