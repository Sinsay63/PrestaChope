<!doctype html>
<html>
    <head>
        <title>Connexion</title>
        <link rel="stylesheet" type="text/css" href="assets/css/connexion.css">
    </head>
    <body>
        <main>
            <div class="login">
                <div class="titre_register">
                    <h1>Connexion</h1>
                </div>
                <div class="form_login">
                    <form action="" method="post">
                        <input class="form_input" type="text" name="pseudo" placeholder="Nom d'utilisateur"required minlength="3" maxlength="30"/>
                        <input class="form_input" type="password" name="password" placeholder="Mot de passe" required minlength="3"/>
                        <input type="submit" value="Se connecter" >
                    </form>
                </div>
                <div class="form_login">
                    <p> Vous n'avez pas encore de compte ?  <a class="lien_form_login" href="index.php?page=inscription"> Inscrivez-vous gratuitement </a> </p>
                </div>
            </div>
        </main>
    </body>
</html>


