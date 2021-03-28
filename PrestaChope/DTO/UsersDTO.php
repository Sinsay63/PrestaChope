<?php

Class UsersDTO{
    
    private $id;
    private $nom;
    private $prénom;
    private $pseudo;
    private $password;
    private $email;
    private $age;
    private $cagnotte;
    private $isAdmin;
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrénom() {
        return $this->prénom;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getAge() {
        return $this->age;
    }

    function getCagnotte() {
        return $this->cagnotte;
    }

    function getIsAdmin() {
        return $this->isAdmin;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setPrénom($prénom): void {
        $this->prénom = $prénom;
    }

    function setPseudo($pseudo): void {
        $this->pseudo = $pseudo;
    }

    function setPassword($password): void {
        $this->password = $password;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setAge($age): void {
        $this->age = $age;
    }

    function setCagnotte($cagnotte): void {
        $this->cagnotte = $cagnotte;
    }

    function setIsAdmin($isAdmin): void {
        $this->isAdmin = $isAdmin;
    }


    
    
}
