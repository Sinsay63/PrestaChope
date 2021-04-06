<html>
    <head>
        <title>Accueil</title>

        <link rel="stylesheet" type="text/css" href="assets/css/deaher.css">
    </head>
    <body>
        <?php
        if (!empty($_SESSION['ID'])) {
            require_once('DAO/UsersDAO.php');
            $user = UsersDAO::GetUserInfo($_SESSION['ID']);

            echo 'Salut ' . $user->getPseudo();
            ?>
            <a href="index.php?page=deconnexion">Déconnexion</a>

            <?php
        } else {
            ?>
            <a href="index.php?page=connexion"> <input type="button" value="Connexion" />  </a>
            <a href="index.php?page=inscription"> <input type="button" value="Inscription" />  </a>
            <?php
        }
        ?>
        <div class="titre">
            <h1>PrestaChope</h1>
        </div>

        <div class="nav">
            <a href="index.php?page=accueil">Accueil</a>
            <a href="index.php?page=catalogue">Catalogue</a>
            <a href="index.php?page=contact">Contact</a>
        </div>
    </body>
</html>