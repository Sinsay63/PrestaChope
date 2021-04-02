<!doctype html>
<html>
    <head>
        <title>contact</title>
    </head>
    <body>
        <h1>PAGE DE CONTACT</h1>
        <?php 
            if(!empty($_GET['sent'])){
                if($_GET['sent']=='yes'){
                    echo 'Votre demande a bien été envoyée.';
                }
                else{
                    echo "Une erreur s'est produite lors de l'envoi de votre demande.";
                }
            }
        ?>
        <p>Une réclamation, une suggestion une recommendation? Faites-nous en part ci-dessous ! </p>
        <form action="" method="post">
            <select name="type">
                <option value="" hidden>Choisir le type de demande</option>
                <option value="réclamation">Réclamation</option>
                <option value="suggestion">Suggestion</option>
            </select>
            <textarea  name="contenu" rows="5" cols="50" placeholder="Saississez votre demande..."></textarea>
            <input type="hidden" name="idclient" value="<?php echo $_SESSION['Id']; ?>">
            <input type="submit" value="Envoyer">
        </form>
    </body>
</html>

