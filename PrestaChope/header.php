<html>
    <head>
        <title>Accueil</title>
        <link rel="stylesheet" type="text/css" href="assets/css/header.css">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <img id="img-logo" src="assets/images/logo.jpg" alt="alt"/>
            </div>
            <div class="titre">
                <div id="titre-txt">
                    <h1>PrestaChope</h1>
                </div>
            </div>
            <?php
            if (!empty($_SESSION['ID'])) {
                require_once('DAO/UsersDAO.php');
                require_once('DAO/FacturesDAO.php');
                if($_SESSION['IsAdmin']==1){
                    echo 'Trésorerie : '.FacturesDAO::TotalTresorerie().'€';
                }
                $user= new UsersDAO();
                $us=$user->GetUserInfo($_SESSION['ID']);
                ?>
                <a href="index.php?page=deconnexion">Déconnexion</a>

                <?php
                echo 'Bonjour '.$us->getPseudo();
                
            } 
            else {
                ?>
                <div class="boutton-log">
                    <div class="bouton-register">
                        <a id="connect" href="index.php?page=inscription">           	
                            <button class="bouton-R" type="button">
                                <p class="txt-bouton-log">Register</p>
                            </button>
                        </a>
                    </div>
                    <div class="bouton-login">
                        <a id="connect" href="index.php?page=connexion">         
                            <button class="bouton-L" type="button">
                                <p class="txt-bouton-log">Log In</p>
                            </button>
                        </a>
                    </div>	
                </div>
                <?php
            }
            ?>
        </div>
    </body>
</html>