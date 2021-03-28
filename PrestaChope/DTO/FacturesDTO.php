<?php

Class FacturesDTO{
    
    private $id;
    private $montant;
    private $idCommandes;
    private $idTrésorerie;
    
    function getId() {
        return $this->id;
    }

    function getMontant() {
        return $this->montant;
    }

    function getIdCommandes() {
        return $this->idCommandes;
    }

    function getIdTrésorerie() {
        return $this->idTrésorerie;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setMontant($montant): void {
        $this->montant = $montant;
    }

    function setIdCommandes($idCommandes): void {
        $this->idCommandes = $idCommandes;
    }

    function setIdTrésorerie($idTrésorerie): void {
        $this->idTrésorerie = $idTrésorerie;
    }


    
    
}