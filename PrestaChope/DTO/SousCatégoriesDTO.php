<?php

Class SousCatégoriesDTO{
    
    private $nom;
    private $idCatégories;
    
    function getNom() {
        return $this->nom;
    }

    function getIdCatégories() {
        return $this->idCatégories;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setIdCatégories($idCatégories): void {
        $this->idCatégories = $idCatégories;
    }


    
    
}