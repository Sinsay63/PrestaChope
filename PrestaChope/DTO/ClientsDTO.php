<?php

Class ClientsDTO{
    
    private $id;
    private $adresse;
    private $telephone;
    private $idUsers;
    
    
    function getId() {
        return $this->id;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function getIdUsers() {
        return $this->idUsers;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setAdresse($adresse): void {
        $this->adresse = $adresse;
    }

    function setTelephone($telephone): void {
        $this->telephone = $telephone;
    }

    function setIdUsers($idUsers): void {
        $this->idUsers = $idUsers;
    }


    
    
    
    
    
}