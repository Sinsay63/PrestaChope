<?php

Class ClientsDTO extends UsersDTO {

    private $idClient;
    private $adresse;
    private $ville;
    private $cp;
    private $telephone;
    private $idUsers;

    function getIdClient() {
        return $this->idClient;
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

    function setIdClient($idClient): void {
        $this->idClient = $idClient;
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
