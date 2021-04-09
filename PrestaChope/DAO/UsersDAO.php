<?php

require_once('tools/DataBaseLinker.php');
require_once('DTO/UsersDTO.php');
require_once ('DTO/ClientsDTO.php');

Class UsersDAO {

    static function registerUser($nom, $prénom, $email, $age, $pseudo, $password, $password2) {

        $bdd = DataBaseLinker::getConnexion();


        $state = $bdd->prepare("SELECT pseudo from users where pseudo = ? ");
        $state->execute(array($pseudo));
        $username = $state->fetch();

        $state2 = $bdd->prepare("SELECT email from users where email = ? ");
        $state2->execute(array($email));
        $mail = $state2->fetch();
        $error = 0;
        if ($mail) {
            $error++;
            return 2;
        }
        if ($username) {
            $error++;
            return 3;
        }

        if ($password != $password2) {
            $error++;
            return 4;
        }
        if ($error == 0) {
            $reponse = $bdd->prepare("INSERT INTO users(nom,prenom,pseudo,password,email,age) VALUES(?,?,?,?,?,?) ");
            $reponse->execute(array($nom, $prénom, $pseudo, $password, $email, $age));
            return 0;
        }
    }

    static function CheckUsers($pseudo, $password) {


        $bdd = DataBaseLinker::getConnexion();

        $reponse = $bdd->prepare("SELECT * from users where pseudo = ? and password = ? ");
        $reponse->execute(array($pseudo, $password));
        $users = $reponse->fetch();

        if ($users) {

            $user = new UsersDTO();
            $user->setId($users['Id']);

            return $user;
        } else {
            return null;
        }
    }

    static function GetUserInfo($id) {

        $bdd = DataBaseLinker::getConnexion();

        $reponse = $bdd->prepare("SELECT * from users ");
        $reponse->execute(array($id));
        $users = $reponse->fetch();

        if ($users) {
            $user = new UsersDTO();

            $user->setId($users['Id']);
            $user->setNom($users['nom']);
            $user->setPrénom($users['prenom']);
            $user->setPseudo($users['pseudo']);
            $user->setEmail($users['email']);
            $user->setAge($users['age']);
            $user->setCagnotte($users['cagnotte']);
            $user->setIsAdmin($users['isAdmin']);

            return $user;
        }
    }

    static function GetInfoClient($id) {
        $bdd = DataBaseLinker::getConnexion();

        $reponse = $bdd->prepare("SELECT * from clients where Id_Users = ? ");
        $reponse->execute(array($id));
        $clients = $reponse->fetch();

        if ($clients) {
            $client = new ClientsDTO();

            $client->setAdresse($clients['adresse']);
            $client->setTelephone($clients['telephone']);

            return $client;
        }
    }

    static function deleteUser($id) {
        $bdd = DataBaseLinker::getConnexion();

        $reponse = $bdd->prepare("DELETE from users where Id= ? ");
        $reponse->execute(array($id));
    }

}
