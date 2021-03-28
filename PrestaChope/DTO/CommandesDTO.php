<?php

CLass CommandesDTO{
    
    private $id;
    private $idClients;
    
    
    function getId() {
        return $this->id;
    }

    function getIdClients() {
        return $this->idClients;
    }


    function setId($id): void {
        $this->id = $id;
    }

    function setIdClients($idClients): void {
        $this->idClients = $idClients;
    }

}