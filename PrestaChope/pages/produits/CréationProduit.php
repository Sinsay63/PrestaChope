<html>
    <head>
        <title>Création d'un produit</title>
        <link rel="stylesheet" href="assets/css/produits.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/creationproduit.css">
        <script src="assets/js/produits.js" type="text/javascript" async></script>
    </head>
    <body>
        <form action="index.php?page=créationProduit" method="post" enctype="multipart/form-data">
            <?php require_once('DAO/CatégoriesDAO.php'); 
            if (!empty($_FILES['image']) && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['stock'])) {
                echo $_POST['sousCatégorie'];
                echo $_GET['cat'];
            }
            ?>
            CHOIX DE LA CATÉGORIE ET DE LA SOUS-CATÉGORIE:
            <br><br>
            <input type="hidden" name="catégorie" value="<?php echo $_GET['cat']; ?>">
            <select onChange="redirige(this.value)"  > <?php
                if (!empty($_GET['cat'])) {
                    $cat = CatégoriesDAO::SearchCatégoriesByIdAndSousCatégories($_GET['cat']);
                    ?>
                    <option value="" hidden><?php echo $cat->getNom(); ?></option>
                    <?php
                } else {
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
            <?php
            if (!empty($_GET['cat'])) {
                $scat = CatégoriesDAO::searchSousCatégories($_GET['cat']);
                if ($scat != null) {
                    ?>
                    <select name="sousCatégorie" required>
                        <?php
                        if (!empty($_GET['souscat'])) {
                            $souscaté = CatégoriesDAO::SearchSousCatégorieById($_GET['souscat']);
                            ?>
                            <option value="" hidden><?php echo $souscaté->getNom(); ?></option>
                            <?php
                        } else {
                            ?>
                            <option value="" hidden>Recherche de sous catégories</option>
                            <?php
                        }
                        foreach ($scat as $sous_caté) {
                            ?>
                            <option value="<?php echo $sous_caté->getId(); ?>"><?php echo $sous_caté->getNom(); ?></option>
                    <?php } ?>
                    </select>
                <?php }
            }
            ?>
            <br><br>
            <div class="nom_prod">
                Nom :
                <input type="text" name="nom" />
            </div>
            <div class="descri_prod">
                Description:
                <textarea type="text" name="description" cols="25" rows="3" required> </textarea>
            </div>
            <div class="prix_prod">
                Prix:
                <input type="number" name="prix" required min="1"/>
            </div>
            <div class="stock_prod">
                Stock:
                <input type="number" name="stock" required min="0"/>
            </div>
            <br>
            <input type="file" name="image" required/><br><br>
            <input type="submit" value="Créer le produit">
        </form>
    </body>
</html>