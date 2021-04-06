<html>
    <head>
        <title>Inscription</title>
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
        <form action="" method="post">
            <input type="text" name="nom" placeholder="entrez votre nom..." required />
            <input type="text" name="prénom" placeholder="entrez votre prénom..." required/>
            <input type="text" name="email" placeholder="entrez votre email..." required/>
            <select name="age" style="width:90px;" required>
                <option value="" hidden>Votre âge</option>
                
        <?php   for ($i = 18; $i < 100; $i++) { ?>
                    <option value="<?php echo $i ?>"> <?php echo $i . " ans" ?> </option>
        <?php   }
                ?>
            </select>
            <input type="text" name="pseudo" placeholder="entrez votre pseudo..." required/>
            <input type="password" name="password" placeholder="entrez votre mot de passe..." required=""/>
            <input type="password" name="confirm_password" placeholder="Confirmation mot de passe..." required/>
            <input type="submit" value="S'inscrire">            
        </form>
    </body>
</html>




