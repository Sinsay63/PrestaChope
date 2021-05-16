<html>
    <head>
        <title>page d'un produit</title>
        <link rel="stylesheet" href="assets/css/produits.css"/>
         <script type="text/javascript" src="assets/js/display.js" async></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@700&display=swap" rel="stylesheet">
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
                            <img class="img_produit"src="<?php echo $produit->getImage(); ?>" alt="photo produit"/>
                        </div>
                        <?php
                        if (!empty($_SESSION['ID'])) {
                            if ($_SESSION['IsAdmin'] == 1) {
                                ?>
                                <form class="img_produit" action="index.php?page=modifProduit&prod=<?php echo $_GET['prod']; ?>" method="post" enctype="multipart/form-data">
                                    <input  type="file" name="image" required  />
                                    <input  type="submit" value="Modifier"  />
                                </form>
                                <?php
                            }
                        }
                        ?>  
                        <div class="colonne">
                            <div class="nom_prod">
                                <p id="nom"><?php echo $produit->getNom(); ?><p>
                                    <?php
                                    if (!empty($_SESSION['ID'])) {
                                        if ($_SESSION['IsAdmin'] == 1) {
                                            ?>
                                        <form id="form1" method="post" action="index.php?page=modifProduit&prod=<?php echo $_GET['prod']; ?>">
                                            <input type="text" name="info" placeholder="<?php echo $produit->getNom(); ?>" required/>
                                            <input type="hidden" name="quoi" value="nom" required>
                                            <input type="submit" value="Modifier" />
                                        </form>
                                        <input type="button" id="btn1" value="Modifier" onclick="hideThis('form1', 'btn1', 'nom')" />
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                             <div class="stock_prod">
                                <p id="stock"><?php echo $produit->getStock() . " exemplaire(s) restants"; ?><p>
                                    <?php
                                    if (!empty($_SESSION['ID'])) {
                                        if ($_SESSION['IsAdmin'] == 1) {
                                            ?>
                                        <form id="form4" method="post" action="index.php?page=modifProduit&prod=<?php echo $_GET['prod']; ?>">
                                            <input type="number" name="info" placeholder="<?php echo $produit->getStock().' exemplaires'; ?>" required min="0"/>
                                            <input type="hidden"  name="quoi" value="stock" >
                                            <input type="submit" value="Modifier" />
                                        </form>
                                        <input type="button" id="btn4" value="Modifier" onclick="hideThis('form4', 'btn4', 'stock')" />
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="prix_prod">
                                <p id="prix"><?php echo 'Prix : ' . $produit->getPrix() . '€'; ?><p>
                                    <?php
                                    if (!empty($_SESSION['ID'])) {
                                        if ($_SESSION['IsAdmin'] == 1) {
                                            ?>
                                        <form id="form3" method="post" action="index.php?page=modifProduit&prod=<?php echo $_GET['prod']; ?>">
                                            <input type="number" name="info" placeholder="<?php echo $produit->getPrix() . ' €'; ?>" required min="1"/>
                                            <input type="hidden"  name="quoi" value="prix" >
                                            <input type="submit" value="Modifier" />
                                        </form>
                                        <input type="button" id="btn3" value="Modifier" onclick="hideThis('form3', 'btn3', 'prix')" />
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="descri_prod">
                                <p id="description"><?php echo 'Description : ' . $produit->getDescription(); ?><p>
                                    <?php
                                    if (!empty($_SESSION['ID'])) {
                                        if ($_SESSION['IsAdmin'] == 1) {
                                            ?>
                                        <form id="form2" method="post" action="index.php?page=modifProduit&prod=<?php echo $_GET['prod']; ?>">
                                            <textarea type="text" name="info" placeholder="<?php echo $produit->getDescription(); ?>" cols="25" rows="3" required></textarea>
                                            <input type="hidden" name="quoi" value="description" >
                                            <input type="submit" value="Modifier" />
                                        </form>
                                        <input type="button" id="btn2" value="Modifier" onclick="hideThis('form2', 'btn2', 'description')" />
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            
                           
                        </div>
                        <?php
                        if (!empty($_SESSION['ID'])) {
                            if ($_SESSION['IsAdmin'] == 1) {
                                ?>
                                <a href="index.php?page=deleteProduit&prod=<?php echo $_GET['prod']; ?>">Supprimer le produit</a>
                                <?php
                            }
                            if ($_SESSION['IsAdmin'] == 0) {
                                if($produit->getStock()==0){
                                    echo 'Ce produit est en rupture de stock. Il sera restocker sous peu. Merci de votre patience.';
                                }else{
                                ?>
                                <div class="quant">
                                <form action="index.php?page=ajoutPanier" method="post">
                                    <p>Quantité:<p>
                                    <input type="number" name="quantité" max="<?php echo $produit->getStock(); ?>" min="1">
                                    <input type="hidden" name="produit" value="<?php echo $produit->getId(); ?>">
                                    <input type="submit" value="Ajouter au panier">
                                </form>
                            </div>
                                <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <?php
                } else {
                    echo 'Aucun produit n\'a été trouvé.';
                }
                ?>
            </div>
        <?php } ?>
    </body>
</html>




