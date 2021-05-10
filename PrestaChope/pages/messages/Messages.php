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
                    
                }
            }
        } else {
            
        }
        ?>
    </body>
</html>
