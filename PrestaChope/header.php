<html>
    <head>
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <img id="img-logo" src="assets/images/prestaLogo.png" alt="logo"/>
            </div>
            <div class="nav">
                <div class="bouton-accueil">
                    <a id="nav" href="index.php?page=accueil">           	
                        <button class="bouton-A" type="button">
                            <p class="txt-bouton-A">Accueil</p>
                        </button>
                    </a>
                </div>
                <div class="bouton-catalogue">
                    <a id="nav" href="index.php?page=catalogue">           	
                        <button class="bouton-Ca" type="button">
                            <p class="txt-bouton">Catalogue</p>
                        </button>
                    </a>
                </div>
                <?php
                if (!empty($_SESSION['ID'])) {
                        ?>
                        <div class="bouton-contact">
                            <a id="nav" href="index.php?page=contact">           	
                                <button class="bouton-Co" type="button">
                                    <p class="txt-bouton">Contact</p>
                                </button>
                            </a>
                        </div>
                    <div class="bouton-profil">
                        <a id="nav" href="index.php?page=profil">           	
                            <button class="bouton-P" type="button">
                                <p class="txt-bouton">Profil</p>
                            </button>
                        </a>
                    </div>
                    <div class="bouton-deco">
                        <a id="nav" href="index.php?page=deconnexion">           	
                            <button class="bouton-D" type="button">
                                <p class="txt-bouton">Log Out</p>
                            </button>
                        </a>
                    </div>
<<<<<<< HEAD
                    
                    <?php
=======
                        <?php
>>>>>>> b555eb1ad7ba0c567a182d51181eeef78e669573
                    require_once('DAO/UsersDAO.php');
                    require_once('DAO/FacturesDAO.php');
                    if ($_SESSION['IsAdmin'] == 1) {
                        echo "<p class='txt-bouton-A'>Trésorerie : ". FacturesDAO::TotalTresorerie(). "€</p>";
                    }
                    $user = new UsersDAO();
                    $us = $user->GetUserInfo($_SESSION['ID']);
                } else {
                    ?>
                    <div class="bouton-register">
                        <a id="nav" href="index.php?page=inscription">           	
                            <button class="bouton-R" type="button">
                                <p class="txt-bouton">Register</p>
                            </button>
                        </a>
                    </div>
                    <div class="bouton-login">
                        <a id="nav" href="index.php?page=connexion">         
                            <button class="bouton-L" type="button">
                                <p class="txt-bouton">Log In</p>
                            </button>
                        </a>
                    </div>	
                    <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>