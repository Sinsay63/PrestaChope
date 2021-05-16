        <html>
    <head>
        <title>Inscription</title>
        <link rel="stylesheet" type="text/css" href="assets/css/inscription.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        if (!empty($_GET['error'])) {
            switch ($_GET['error']) {
                case 1:
                    echo 'Format email pas bon';
                    break;
                case 2:
                    echo "Email déjà utilisé.";
                    break;
                case 3:
                    echo 'Pseudo déjà utilisé.';
                    break;
                case 4:
                    echo 'Les mots de passe ne correspondent pas.';
                    break;
            }
        }
        ?>
        <div class="erreur">
        <p>       <p>
        </div>
        <div id="container">

        <form action="" method="post">
            <div class="inscr">
            <p> Inscription <p>
            </div>
            <div class="nomprenom">
            <div class="nom">
             <label><b>Votre nom</b></label>
            
            
            <input type="text" name="nom" placeholder="entrez votre nom..." required />
            </div>
            <div class="prenom">
            <label><b>Votre prénom</b></label>
            <input type="text" name="prénom" placeholder="entrez votre prénom..." required/>
            </div>
        </div>
            <div class="emailpseudo">
            <div class="email">
            <label><b>Votre email</b></label>
            <input type="text" name="email" placeholder="entrez votre email..." required/>
            </div>
            
            <div class="pseudo">
            <label><b>Votre pseudo</b></label>
            <input type="text" name="pseudo" placeholder="entrez votre pseudo..." required/>
            </div>
        </div>
            <div class="mdpconf">
            <div class="mot_de_passe">
            <label><b>Votre mot de passe</b></label>
            <input type="password" name="password" placeholder="entrez votre mot de passe..." required=""/>
            </div>

            <div class="confmdp">
            <label>Confirmez</label>
            <input type="password" name="confirm_password" placeholder="Confirmation mot de passe..." required/>
        </div>
    
    </div> 
            <div class="age">
            <label><b>Votre age</b></label>

        
            <select name="age" style="width:90px;" required>

                <option value="" hidden>Votre âge</option>


                
        <?php   for ($i = 18; $i < 100; $i++) { ?>
                    <option value="<?php echo $i ?>"> <?php echo $i . " ans" ?> </option>
        <?php   }
                ?>
                
            </select>
            </div>   
            <input type="submit" value="S'inscrire" >
                   
        </form>
    </div>
    </body>
</html>




