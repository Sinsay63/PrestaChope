<?php

class ContactDTO{
    private $id;
    private $contenu;
    private $typeDemande;
    private $isViewed;
    private $idClients;
    
    
    function getId() {
        return $this->id;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getTypeDemande() {
        return $this->typeDemande;
    }

    function getIsViewed() {
        return $this->isViewed;
    }

    function getIdClients() {
        return $this->idClients;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setContenu($contenu): void {
        $this->contenu = $contenu;
    }

    function setTypeDemande($typeDemande): void {
        $this->typeDemande = $typeDemande;
    }

    function setIsViewed($isViewed): void {
        $this->isViewed = $isViewed;
    }

    function setIdClients($idClients): void {
        $this->idClients = $idClients;
    }


    
    
    
    
    
    
    
    
    
}

