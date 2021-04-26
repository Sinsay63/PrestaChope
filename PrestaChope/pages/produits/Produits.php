<html>
    <head>
        <title>page d'un produit</title>
        <link rel="stylesheet" href="assets/css/produits.css"/>
        <script type="text/javascript">
            function hideThis(_div, _btn, title) {
                var obj = document.getElementById(_div);
                var obj2 = document.getElementById(_btn);
                var obj3 = document.getElementById(title);
                if (obj.style.display === "block") {
                    obj.style.display = "none";
                } else {
                    obj.style.display = "block";
                    obj2.style.display = "none";
                    obj3.style.display = "none";
                }
            }
        </script>
    </head>
    <body>
        <h1>Produits</h1>
        <?php
        if (!empty($_SESSION['ID'])) {
            if (!empty($_GET['prod'])) {
                $user = UsersDAO::GetUserInfo($_SESSION['ID']);
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
                            <?php if ($user->getIsAdmin() == 1) { ?>
                                <form class="img_produit" action="" method="post" enctype="multipart/form-data">
                                    <input  type="file" name="image" required  />
                                    <input  type="submit" value="Modifier"  />
                                </form>
                            <?php }
                            ?>
                            <div class="nom_prod">
                                nom :<p id="nom"><?php echo $produit->getNom(); ?><p>
                                <form id="form1" method="post" action="">
                                    <input type="text" name="info" placeholder="<?php echo $produit->getNom(); ?>"/>
                                    <input type="hidden" name="quoi" value="nom">
                                    <input type="submit" value="Modifier" />
                                </form>
                                <input type="button" id="btn1" value="Modifier" onclick="hideThis('form1', 'btn1', 'nom')" />
                            </div>
                            <div class="descri_prod">
                                Description:<p id="description"><?php echo $produit->getDescription(); ?><p>
                                <form id="form2" method="post" action="">
                                    <textarea type="text" name="info" placeholder="<?php echo $produit->getDescription(); ?>" cols="25" rows="3"> </textarea>
                                    <input type="hidden" name="quoi" value="description">
                                    <input type="submit" value="Modifier" />
                                </form>
                                <input type="button" id="btn2" value="Modifier" onclick="hideThis('form2', 'btn2', 'description')" />
                            </div>
                            <div class="prix_prod">
                                Prix:<p id="prix"><?php echo $produit->getPrix().'€'; ?><p>
                                <form id="form3" method="post" action="">
                                    <input type="text" name="info" placeholder="<?php echo $produit->getPrix().'€'; ?>"/>
                                    <input type="hidden" name="quoi" value="prix">
                                    <input type="submit" value="Modifier" />
                                </form>
                                <input type="button" id="btn3" value="Modifier" onclick="hideThis('form3', 'btn3', 'prix')" />
                            </div>
                            <a href="index.php?page=produits&delete=<?php echo $_GET['prod'];?>">Supprimer le produit</a>
                        </div>
                        <?php
                    } else {
                        echo 'Aucun produit n\'a été trouvé.';
                    }
                    ?>
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>




