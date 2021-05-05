<html>
    <head>
        <title></title>
        <script type="text/javascript" src="assets/js/catégories.js" async></script>
        <style>
            a{
                text-decoration: none;
                color:black;
            }
        </style>
    </head>
    <body>
        <?php
        if (!empty($_GET['caté'])) {
            $caté = CatégoriesDAO::SearchCatégoriesByIdAndSousCatégories($_GET['caté']);
            ?>
            <form action="index.php?page=modifCatégorie" id="modifForm" method="post">
                <label for="#nom">Nom: </label>
                <input id="nom" type="text" name="nom" value="<?php echo $caté->getNom(); ?>"><br>
                <label for="#description">Description: </label>
                <textarea id="description" name="description"   rows="3" cols="30"><?php echo $caté->getDescription(); ?></textarea><br>

                <?php if ($caté->getSouscatégories() != null) { ?>
                    Sous-Catégories : (5 max) <br>
                    <div id="sousCaté">
                        <?php
                        foreach ($caté->getSouscatégories() as $souscaté) {
                            ?>
                            <input type="text" name="sousCaté[]" value="<?php echo $souscaté->getNom(); ?>" >
                            <input type="hidden" name="idSousCaté[]" value="<?php echo $souscaté->getId(); ?>">
                            <?php
                        }
                        ?>
                    </div>
                    <input id="btnAdd" type="button" value="Ajouter une sous-catégorie" >
                    <br>
                <?php }
                ?>
                <br><br>
                <input type="hidden" name="idCaté" value="<?php echo $_GET['caté']; ?>" >
                <input type="submit" value="Modifier"> 
            </form>

            <a href="index.php?page=catégories">Revenir en arrière</a>
            <?php
        } 
        else if (!empty($_GET['création'])) {  ?>
            <form action="index.php?page=créationCatégorie">
                Nom:
                <input id="nom" type="text" name="nom" ></label>
                Description:
                <textarea id="description" name="name" rows="5" cols="10"></textarea>
                <input type="submit" value="Créer la catégorie">
            </form>
            <?php
        } 
        else {
            $allCaté = CatégoriesDAO::SearchAllCatégories_SousCatégories();
            if ($allCaté != null) {
                foreach ($allCaté as $value) {  ?>
                    <a href="index.php?page=catégories&caté=<?php echo $value->getId(); ?>"> 
                        <?php
                        echo 'Catégorie : ' . $value->getNom() . '<br>';
                        echo 'Description : ' . $value->getDescription() . '<br>';
                        echo 'Sous catégories:';
                        foreach ($value->getSouscatégories() as $souscaté) {
                            echo '<li>' . $souscaté->getNom() . '</li>';
                        }  ?>
                    </a>
                    <br>
                    <a href="index.php?page=deleteCatégorie&id=<?php echo $value->getId(); ?>">Supprimer la catégorie : <?php echo $value->getNom(); ?></a><br><br>
                    <?php
                }
            }
            else{
                echo 'Aucune catégorie n\'a été trouvé';
            }
        }
        ?>
    </body>
</html>


