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
        $allCaté = CatégoriesDAO::SearchAllCatégories_SousCatégories();
        if ($allCaté != null) {
            foreach ($allCaté as $value) {
                ?>
                <a href="index.php?page=modifCatégorie&caté=<?php echo $value->getId(); ?>"> 
                    <p>Catégorie : <?php echo $value->getNom(); ?> </p><br>
                    <p>Description : <?php echo $value->getDescription(); ?></p><br>
                    <p>Sous catégories:</p>
                    <?php foreach ($value->getSouscatégories() as $souscaté) { ?>
                        <li> <?php echo $souscaté->getNom(); ?></li>
                    <?php } ?>
                </a>
                <br>
                <a href="index.php?page=deleteCatégorie&id=<?php echo $value->getId(); ?>">Supprimer la catégorie : <?php echo $value->getNom(); ?></a><br><br>
                <?php
            }
            ?>
            <a href="index.php?page=créationCatégorie">Ajouter une nouvelle catégorie </a>
            <?php
        } else {
            ?>
            <p>Aucune catégorie n'a été trouvé.</p>
            <a href="index.php?page=créationCatégorie">Ajouter une nouvelle catégorie </a>
            <?php
        }
        ?>
    </body>
</html>


