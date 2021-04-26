<?php

Class ClientsDTO extends UsersDTO {

    private $id;
    private $adresse;
    private $ville;
    private $cp;
    private $telephone;
    private $idUsers;

    function getId() {
        return $this->id;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getVille() {
        return $this->ville;
    }

    function getCp() {
        return $this->cp;
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

    function setVille($ville): void {
        $this->ville = $ville;
    }

    function setCp($cp): void {
        $this->cp = $cp;
    }

    function setTelephone($telephone): void {
        $this->telephone = $telephone;
    }

    function setIdUsers($idUsers): void {
        $this->idUsers = $idUsers;
    }

}
