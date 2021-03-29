<?php
require_once('tools/DataBaseLinker.php');
require_once('DTO/UsersDTO.php');

Class UsersDAO{
    
    static function CheckUsers($pseudo,$password){
        
        
        $bdd=DataBaseLinker::getConnexion();
        
        $reponse=$bdd->prepare("SELECT * from users where pseudo = ? and password = ? ");
        $reponse->execute(array($pseudo,$password));
        $users=$reponse->fetch();
        
        if($users){
            
            $user = new UsersDTO();
            $user->setId($users['Id']);
            
            return $user;
        }
        else{
            return null;
        }
    }
    
    static function GetUserInfo($id){
        
        $bdd=DataBaseLinker::getConnexion();
        
        $reponse=$bdd->prepare("SELECT * from users ");
        $reponse->execute(array($id));
        $users=$reponse->fetch();
        
        if($users){
             $user = new UsersDTO();
        
            $user->setId($users['Id']);
            $user->setNom($users['nom']);
            $user->setPrénom($users['prenom']);
            $user->setPseudo($users['pseudo']);
            $user->setEmail($users['email']);
            $user->setAge($users['age']);
            $user->setCagnotte($users['cagnotte']);
            $user->setIsAdmin($users['IsAdmin']);

            return $user;
        }
    }
}
