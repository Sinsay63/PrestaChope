<?php

CLass CommandesDTO {

    private $idFacture;
    private $listeProduits;
    private $montant;
    private $date;
    private $idClients;

    function getIdFacture() {
        return $this->idFacture;
    }

    function getListeProduits() {
        return $this->listeProduits;
    }

    function getMontant() {
        return $this->montant;
    }

    function getDate() {
        return $this->date;
    }

    function getIdClients() {
        return $this->idClients;
    }

    function setIdFacture($idFacture): void {
        $this->idFacture = $idFacture;
    }

    function setListeProduits($listeProduits): void {
        $this->listeProduits = $listeProduits;
    }

    function setMontant($montant): void {
        $this->montant = $montant;
    }

    function setDate($date): void {
        $this->date = $date;
    }

    function setIdClients($idClients): void {
        $this->idClients = $idClients;
    }
}