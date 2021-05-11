<html>
    <head>
        <title>Profil</title>
        <script type="text/javascript" src="assets/js/Profil.js" async></script>
        
        <link rel="stylesheet" href="assets/css/profil.css"/>
    <body>
        <?php
        if (!empty($_SESSION['ID'])) {
            $user = ControllerProfil::getInfoUser($_SESSION['ID']);
            ?>
            <div class="user_profil">
                <div class="prénom">
                    Votre prénom:<p id="prénoms"><?php echo $user->getPrénom(); ?><p>
                    <form id="form1" method="post" action="index.php?page=modifProfil">
                        <input type="text" name="info" placeholder="<?php echo $user->getPrénom(); ?>"/>
                        <input type="hidden" name="type" value="prenom">
                        <input type="submit" value="Modifier" />
                    </form>
                    <input type="button" id="btn1" value="Modifier" onclick="hideThis('form1', 'btn1', 'prénoms')" />
                </div>
                <div class="nom">
                    Votre nom:<p id="noms"><?php echo $user->getNom(); ?><p>
                    <form id="form2" method="post" action="index.php?page=modifProfil">
                        <input type="text" name="info" placeholder="<?php echo $user->getNom(); ?>"/>
                        <input type="hidden" name="type" value="nom">
                        <input type="submit" value="Modifier" />
                    </form>
                    <input type="button" id="btn2" value="Modifier" onclick="hideThis('form2', 'btn2', 'noms')" />
                </div>
                <div class="email">
                    Votre email:<p id="emails"><?php echo $user->getEmail(); ?><p>
                    <form id="form3" method="post" action="index.php?page=modifProfil">
                        <input type="text" name="info" placeholder="<?php echo $user->getEmail(); ?>"/>
                        <input type="hidden" name="type" value="email">
                        <input type="submit" value="Modifier" />
                    </form>
                    <input type="button" id="btn3" value="Modifier" onclick="hideThis('form3', 'btn3', 'emails')" />
                </div>
                <div class="pseudo">
                    Votre pseudo:<p id="pseudos"><?php echo $user->getPseudo(); ?><p>
                    <form id="form4" method="post" action="index.php?page=modifProfil">
                        <input type="text" name="info" placeholder="<?php echo $user->getPseudo(); ?>"/>
                        <input type="hidden" name="type" value="pseudo">
                        <input type="submit" value="Modifier" />
                    </form>
                    <input type="button" id="btn4" value="Modifier" onclick="hideThis('form4', 'btn4', 'pseudos')" />
                </div>
                <div class="password">
                    Votre mot de passe:<p>
                    <form id="form5" method="post" action="index.php?page=modifProfil">
                        <input type="password" name="info[]" placeholder="Nouveau mot de passe"/>
                        <input type="password" name="info[]" placeholder="Retapez mot de passe" />
                        <input type="hidden" name="type" value="password">
                        <input type="submit" value="Modifier" />
                    </form>
                    <input type="button" id="btn5" value="Modifier" onclick="hideThis('form5', 'btn5', 'password')" />
                </div>

                <?php
                if ($_SESSION['IsAdmin'] == 0) {
                    $client = ControllerProfil::getInfoClient($_SESSION['ID']);
                    if (!empty($client)) {
                        ?>
                        <div class="adresse">
                            Votre adresse:<p id="adresses"><?php echo $client->getAdresse() . ' - ' . $client->getVille() . ' - ' . $client->getCp(); ?><p>
                            <form id="form5" method="post" action="index.php?page=modifProfil">
                                <input type="text" name="info[]" placeholder="<?php echo $client->getAdresse(); ?>"/>
                                <input type="text" name="info[]" placeholder="<?php echo $client->getVille(); ?>"/>
                                <input type="text" name="info[]" placeholder="<?php echo $client->getCp(); ?>"/>
                                <input type="hidden" name="type" value="adresse">
                                <input type="submit" value="Modifier" />
                            </form>
                            <input type="button" id="btn5" value="Modifier" onclick="hideThis('form5', 'btn5', 'adresses')" />
                        </div>
                        <div class="téléphone">
                            Votre numéro de téléphone:<p id="telephones"><?php echo $client->getTelephone(); ?><p>
                            <form id="form6" method="post" action="index.php?page=modifProfil">
                                <input type="text" name="info" placeholder="<?php echo $client->getTelephone(); ?>"/>
                                <input type="hidden" name="type" value="telephone">
                                <input type="submit" value="Modifier" />
                            </form>
                            <input type="button" id="btn6" value="Modifier" onclick="hideThis('form6', 'btn6', 'telephones')" />
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="adresse">
                            Votre adresse:
                            <form id="form7" method="post" action="index.php?page=modifProfil">
                                <input type="text" name="info[]" placeholder="Adresse"/>
                                <input type="text" name="info[]" placeholder="Ville"/>
                                <input type="text" name="info[]" placeholder="Code postal"/>
                                <input type="hidden" name="type" value="adresse">
                                <input type="submit" value="Ajouter" />
                            </form>
                            <input type="button" id="btn7" value="Ajouter" onclick="hideThis('form7', 'btn7', '')" />
                        </div>

                        <div class="téléphone">
                            Votre numéro de téléphone:
                            <form id="form8" method="post" action="index.php?page=modifProfil">
                                <input type="text" name="info" placeholder="Votre numéro de téléphone"/>
                                <input type="hidden" name="type" value="telephone">
                                <input type="submit" value="Ajouter" />
                            </form>
                            <input type="button" id="btn8" value="Ajouter" onclick="hideThis('form8', 'btn8', '')" />
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="delete_user">
                    <a href="index.php?page=deleteProfil&delete=<?php echo $_SESSION['ID']; ?>">Supprimer le compte</a>
                </div>
            </div>
  <?php } ?>
    </body>
</html>
