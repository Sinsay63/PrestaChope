<html>
    <head>
        <title>Création d'un produit</title>
        <link rel="stylesheet" href="assets/css/produits.css"/>
        <script src="assets/js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <form action="index.php?page=créationProduit" method="post" enctype="multipart/form-data">
            <input type="file" name="image" required/>
            <div class="nom_prod">
                Nom :
                <input type="text" name="nom" required/>
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
            <input type="submit" value="Créer le produit">
        </form>
    </body>
</html>