<html>
    <head>
        <title></title>
        <script type="text/javascript" src="assets/js/catégories.js" async></script>
        <link rel="stylesheet" type="text/css" href="assets/css/categories.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <style>
            a{
                text-decoration: none;
                color:black;
            }
        </style>
    </head>
    <body>
        <div class="prod">
        <?php
        $allCaté = CatégoriesDAO::SearchAllCatégories_SousCatégories();
        if ($allCaté != null) {
            foreach ($allCaté as $value) {
                ?>
                <div class="align">
                <p>Catégorie : <?php echo $value->getNom(); ?> </p><br>
                    <p>Description : <?php echo $value->getDescription(); ?></p><br>
                    <p>Sous catégories:</p>  

                    <?php 
                    if(!empty($value->getSouscatégories())){
                        
                    foreach ($value->getSouscatégories() as $souscaté) { ?>
                        <li> <?php echo $souscaté->getNom(); ?></li>
                    <?php }
                    } 
                    else{
                        echo 'Cette catégorie n\'a pas de sous-catégorie';
                    } ?>
                <a href="index.php?page=modifCatégorie&caté=<?php echo $value->getId(); ?>">
                <button class="button button1">Modifier cette catégorie</button>
                    
                    
                </a>
                <br>
                <a href="index.php?page=deleteCatégorie&id=<?php echo $value->getId(); ?>"><button class="button button2">Supprimer cette catégorie</button></a><br><br>
            </div>
                <?php

            }

            ?>
            <a href="index.php?page=créationCatégorie"><button class="button button3">Ajouter une catégorie</button></a>
            <?php
        } else {
            ?>
            <p>Aucune catégorie n'a été trouvé.</p>
            <a href="index.php?page=créationCatégorie">Ajouter une nouvelle catégorie </a>
            <?php
        }
        ?>
    </div>
    </body>
</html>


