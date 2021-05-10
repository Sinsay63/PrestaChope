<html>
    <head>
        <title>Création catégorie</title>
        <script src="assets/js/catégories.js" async></script>
    </head>
    <body>
        <form action="" method="post">
            Nom:
            <input id="nom" type="text" name="nom" ><br>
            Description:
            <textarea id="description" name="description" rows="5" cols="10"></textarea><br>

            Sous-catégories (2 minimum, 5 maximum):<br>
            <div id="sousCaté2">
                <input type="text" name="sousCaté[]" placeholder="Nouvelle sous-catégorie">
                <input type="text" name="sousCaté[]" placeholder="Nouvelle sous-catégorie">
            </div><br><br>
            <input id="buttonAdd" type="button" value="Ajouter une sous-catégorie" >
            <input type="submit" value="Créer la catégorie">
        </form>
    </body>
</html>
