<?php

class PanierDTO{
    
    private $id;
    private $quantité;
    private $idproduit;
    private $iduser;
    
    function getId() {
        return $this->id;
    }

    function getQuantité() {
        return $this->quantité;
    }

    function getIdproduit() {
        return $this->idproduit;
    }

    function getIduser() {
        return $this->iduser;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setQuantité($quantité): void {
        $this->quantité = $quantité;
    }

    function setIdproduit($idproduit): void {
        $this->idproduit = $idproduit;
    }

    function setIduser($iduser): void {
        $this->iduser = $iduser;
    }

}
