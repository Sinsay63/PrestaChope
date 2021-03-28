<?php

Class QuantitésDTO{
    
    private $id;
    private $nombre;
    private $idCommandes;
    
    
    
    function getId(){
        return $this->id;
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getIdCommandes() {
        return $this->idCommandes;
    }

    function setId($id) : void {
        $this->id = $id;
    }
    
    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setIdCommandes($idCommandes): void {
        $this->idCommandes = $idCommandes;
    }


    
    
    
}
