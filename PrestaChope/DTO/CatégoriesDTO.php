<?php

Class CatégoriesDTO {

    private $id;
    private $nom;
    private $description;
    private $souscatégories = [];

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getDescription() {
        return $this->description;
    }

    function getSouscatégories() {
        return $this->souscatégories;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNom($nom): void {
        $this->nom = $nom;
    }

    function setDescription($description): void {
        $this->description = $description;
    }

    function setSouscatégories($souscatégories): void {
        $this->souscatégories[] = $souscatégories;
    }

}
