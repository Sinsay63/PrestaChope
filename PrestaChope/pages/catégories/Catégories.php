<html>
    <head>
        <title></title>
        <script type="text/javascript" src="assets/js/catégories.js" async></script>
        <link rel="stylesheet" type="text/css" href="assets/css/categories.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <style>
            body{
                background-color: rgb(215, 219, 221);
            }

            main{
                padding-right: 150px; 
                padding-left: 150px; 
            }
            
            a{
                text-decoration: none;
                color:black;
            }
        </style>
    </head>
    <body>
<<<<<<< HEAD
        <main>
            <?php
            $allCaté = CatégoriesDAO::SearchAllCatégories_SousCatégories();
            if ($allCaté != null) {
                foreach ($allCaté as $value) {
                    ?>
                    <a href="index.php?page=modifCatégorie&caté=<?php echo $value->getId(); ?>"> 
                        <p>Catégorie : <?php echo $value->getNom(); ?> </p><br>
                        <p>Description : <?php echo $value->getDescription(); ?></p><br>
                        <p>Sous catégories:</p>
                        <?php
                        if (!empty($value->getSouscatégories())) {

                            foreach ($value->getSouscatégories() as $souscaté) {
                                ?>
                                <li> <?php echo $souscaté->getNom(); ?></li>
                                <?php
                            }
                        } else {
                            echo 'Cette catégorie n\'a pas de sous-catégorie';
                        }
                        ?>
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
=======
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
>>>>>>> 069e26b565b02d83ae73ac12597c7e4ad96ab1f2
                <?php

            }

            ?>
<<<<<<< HEAD
        </main>
=======
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
>>>>>>> 069e26b565b02d83ae73ac12597c7e4ad96ab1f2
    </body>
</html>


