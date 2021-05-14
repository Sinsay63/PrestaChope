<html>
    <head>
        <title>messages</title>
        <link rel="stylesheet" href="assets/css/messages.css"/>
        <script src="assets/js/messages.js" async></script>
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
                    $user = UsersDAO::getUserInfo($value->getIdClients());

                    $dates = new DateTime($value->getDate());
                    $date = $dates->format('d/m/Y');
                    $heures = $dates->format('H');
                    $minutes = $dates->format('i');
                    ?>
                    <div class="messages">
                        <p> Message : <?php echo $value->getContenu() ?></p>
                        <p> Ecrit par  <?php echo $user->getPseudo() ?></p>
                        <p> Envoyé le  <?php echo $date . ' à ' . $heures . 'h' . $minutes; ?></p>
                        <form action="" method="post">
                            <label>Vu</label>
                            <input type="checkbox" class="checkbox" name="viewed" <?php if ($value->getIsViewed() == 1) { ?> checked <?php } ?> value="<?php echo $value->getId(); ?>">
                        </form>
                    </div>
                    <br><br>
                    <?php
                }
            } else {
                echo 'Aucun message n\'a été trouvé.';
            }
        } else {
            $messages = ContactDAO::getMessagesByIdClients($_SESSION['ID']);
            if ($messages != null) {
                ?>
                <p>VOS MESSAGES ENVOYÉS :</p>
                <?php
                foreach ($messages as $value) {
                    $dates = new DateTime($value->getDate());
                    $date = $dates->format('d/m/Y');
                    $heures = $dates->format('H');
                    $minutes = $dates->format('i');
                    ?>
                    <p> Type:<?php echo $value->getTypeDemande(); ?> </p>
                    <p> Message : <?php echo $value->getContenu() ?></p>
                    <p> Envoyé le  <?php echo $date . ' à ' . $heures . 'h' . $minutes; ?></p>
                    <?php if ($value->getIsViewed() == 1) { ?>
                        <p> Votre message a été pris en compte par l'équipe. Merci de votre retour!</p>
                        <?php
                    } 
                    else {
                        ?>
                        <p> Votre message n'a pas encore été vu. Merci tout de même de votre retour!</p>
                        <?php
                    }
                }
            }
        }
        ?>
    </body>
</html>
