<html>
    <head>
        <title>messages</title>
    </head>
    <body>
        <?php
        if ($_SESSION['IsAdmin'] == 1) {
            $messages = ContactDAO::getAllMessages();
            if ($messages != null) {
                ?>
                <p> MESSAGES RÉCLAMATIONS / SUGGESTIONS :</p>
                <?php
                foreach ($messages as $value) { 
                    $user= UsersDAO::getInfoClient($value->getIdClients());
                    ?>
                <p> Message:<?php $value->getContenu()?></p>
                <p> Envoyé par :<?php $user->getPseudo()?></p>
                
                
                
                <?php
                }
            }
        } else {
            
        }
        ?>
    </body>
</html>
