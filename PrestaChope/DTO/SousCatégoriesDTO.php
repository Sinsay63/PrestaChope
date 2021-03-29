<?php

Class SousCatégoriesDTO{
    
    private $id;
    private $nom;
    private $idCatégories;
    
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getIdCatégories() {
        return $this->idCatégories;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setIdCatégories($idCatégories): void {
        $this->idCatégories = $idCatégories;
    }
}