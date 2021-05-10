<html>
    <head>
        <title>modif catégorie</title>
        <script src="assets/js/catégories.js" async></script>
    </head>
    <body>
        <?php
        $caté = CatégoriesDAO::SearchCatégoriesByIdAndSousCatégories($_GET['caté']);
        ?>
        <form action="index.php?page=modifCatégorie" id="modifForm" method="post">
            <label for="#nom">Nom: </label>
            <input id="nom" type="text" name="nom" value="<?php echo $caté->getNom(); ?>"><br>
            <label for="#description">Description: </label>
            <textarea id="description" name="description" rows="3" cols="30"><?php echo $caté->getDescription(); ?></textarea><br>
            <?php 
            if ($caté->getSouscatégories() != null) { ?>
                Sous-Catégories : (5 max) <br>
                <div id="sousCaté">
                    <?php
                    foreach ($caté->getSouscatégories() as $souscaté) { ?>
                        <input type="text" name="sousCaté[]" value="<?php echo $souscaté->getNom(); ?>" >
                        <input type="hidden" name="idSousCaté[]" value="<?php echo $souscaté->getId(); ?>">
                    <?php
                    } ?>
                </div>
                <input id="btnAdd" type="button" value="Ajouter une sous-catégorie" >
                <br>
            <?php } ?>
            <br><br>
            <input type="hidden" name="idCaté" value="<?php echo $_GET['caté']; ?>" >
            <input type="submit" value="Modifier"> 
        </form>
        <a href="index.php?page=catégories">Revenir en arrière</a>
    </body>
</html>
