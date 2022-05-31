<html>
    <head>
        <title>Création catégorie</title>
        <link rel="stylesheet" href="assets/css/creacate.css"/>
        <script src="assets/js/catégories.js" async></script>
    </head>
    <body>
        <h1>CRÉATION D'UNE CATÉGORIE</h1>
        <form action="" method="post">
            <div class="contentForm">
                <div class="nom">
                    <span>Nom:</span>
                    <input id="nom" type="text" name="nom" required>
                </div>
                <div class="description">
                    <span>Description:</span>
                    <textarea id="description" name="description" rows="2" cols="30" required=""></textarea>
                </div>
                <div class="souscategorie">
                    <span>Sous-catégories (2 minimum, 5 maximum):</span>
                    <div id="sousCaté2">
                        <input type="text" name="sousCaté[]" placeholder="Nouvelle sous-catégorie">
                        <input type="text" name="sousCaté[]" placeholder="Nouvelle sous-catégorie">
                    </div>
                </div>
                <div class="inputBtn">
                    <input id="buttonAdd" type="button" value="Ajouter une sous-catégorie" >
                    <input type="submit" value="Créer la catégorie">
                </div>
            </div>
        </form>
    </body>
</html>
