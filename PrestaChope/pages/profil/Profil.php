<html>
    <head>
        <title>Profil</title>
        <script type="text/javascript">
            function hideThis(_div, _btn, title) {
                var obj = document.getElementById(_div);
                var obj2 = document.getElementById(_btn);
                var obj3 = document.getElementById(title);
                if (obj.style.display === "block") {
                    obj.style.display = "none";
                } else {
                    obj.style.display = "block";
                    obj2.style.display = "none";
                    obj3.style.display = "none";
                }
            }
        </script>
        <link rel="stylesheet" href="assets/css/profil.css"/>
    <body>
        <?php
        $user = ControllerProfil::GetInfoUser($_SESSION['ID']);
        ?>
        <div class="user_profil">
            <div class="prénom">
                Votre prénom:<p id="prénoms"><?php echo $user->getPrénom(); ?><p>
                <form id="form1" method="post" action="">
                    <input type="text" name="nom" placeholder="<?php echo $user->getPrénom(); ?>"/>
                    <input type="submit" value="Modifier" />
                </form>
                <input type="button" id="btn1" value="Modifier" onclick="hideThis('form1', 'btn1', 'prénoms')" />
            </div>
            <div class="nom">
                Votre nom:<p id="noms"><?php echo $user->getNom(); ?><p>
                <form id="form2" method="post" action="">
                    <input type="text" name="nom" placeholder="<?php echo $user->getNom(); ?>"/>
                    <input type="submit" value="Modifier" />
                </form>
                <input type="button" id="btn2" value="Modifier" onclick="hideThis('form2', 'btn2', 'noms')" />
            </div>
            <div class="email">
                Votre email:<p id="emails"><?php echo $user->getEmail(); ?><p>
                <form id="form3" method="post" action="">
                    <input type="text" name="email" placeholder="<?php echo $user->getEmail(); ?>"/>
                    <input type="submit" value="Modifier" />
                </form>
                <input type="button" id="btn3" value="Modifier" onclick="hideThis('form3', 'btn3', 'emails')" />
            </div>
            <div class="pseudo">
                Votre pseudo:<p id="pseudos"><?php echo $user->getNom(); ?><p>
                <form id="form4" method="post" action="">
                    <input type="text" name="pseudo" placeholder="<?php echo $user->getNom(); ?>"/>
                    <input type="submit" value="Modifier" />
                </form>
                <input type="button" id="btn4" value="Modifier" onclick="hideThis('form4', 'btn4', 'pseudos')" />
            </div>

            <?php
            if ($_SESSION['IsAdmin'] == 0) {
                $client = ControllerProfil::GetInfoClient($_SESSION['ID']);
                if (!empty($client)) {
                    ?>
                    <div class="adresse">
                        Votre adresse:<p id="adresses"><?php echo $client->getAdresse(); ?><p>
                        <form id="form5" method="post" action="">
                            <input type="text" name="adresse" placeholder="<?php echo $client->getAdresse(); ?>"/>
                            <input type="submit" value="Modifier" />
                        </form>
                        <input type="button" id="btn5" value="Modifier" onclick="hideThis('form5', 'btn5', 'adresses')" />
                    </div>
                    <div class="téléphone">
                        Votre numéro de téléphone:<p id="telephones"><?php echo $client->getTelephone(); ?><p>
                        <form id="form6" method="post" action="">
                            <input type="text" name="telephone" placeholder="<?php echo $client->getTelephone(); ?>"/>
                            <input type="submit" value="Modifier" />
                        </form>
                        <input type="button" id="btn6" value="Modifier" onclick="hideThis('form6', 'btn6', 'telephones')" />
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="adresse">
                        Votre adresse:
                        <input type="text" name="adresse">
                    </div>

                    <div class="téléphone">
                        Votre numéro de téléphone:
                        <input type="text" name="telephone">
                    </div>
                    <?php
                }
            }
            ?>

            <div class="delete_user">
                <a href="index.php?page=profil&delete=1">Supprimer le compte</a>
            </div>
        </div>
    </body>
</html>
