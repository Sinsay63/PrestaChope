<!doctype html>
<html>
    <head>
        <title>contact</title>
        <link rel="stylesheet" type="text/css" href="assets/css/contact.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
        <div class="centrage_titre">
        <h1>Contactez-nous</h1>
        </div> 
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
        <div class ="centrage_descri">
        <p>Une réclamation, une suggestion une recommendation? Faites-nous en part ci-dessous ! </p>
        </div>
        

        <form action="" method="post">
        <div class="type">
            <select name="type">
                <option value="" hidden id="type">Choisir le type de demande </option>
               
                
                <option value="réclamation">Réclamation</option>
                <option value="suggestion">Suggestion</option>
              
            </select>
        </div>
            <div class="align">
            <textarea  name="contenu" rows="5" cols="30" placeholder="Saississez votre demande..." id="contact_area"></textarea>
            <input type="hidden" name="idclient" value="<?php echo $_SESSION['ID']; ?>">
            <input type="submit" value="Envoyer" id="contact_btn" >
            </div>
       
        </form>
    
 </div>
        
    </body>
</html>

