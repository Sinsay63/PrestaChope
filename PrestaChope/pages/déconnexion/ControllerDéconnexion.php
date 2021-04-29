<?php

class ControllerDéconnexion {
    
    public function déconnexion(){
        session_unset();
        session_destroy();
    }
}
