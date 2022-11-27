<?php

class Login{

    // Constructor de la clase
    function __construct($user, $pass){
        $this->user = $user;
        $this->pass = $pass;
    }

    // Getters
    function getUser(){
        return $this->user;
    }

    function getPass(){
        return $this->pass;
    }

} //Fin Clase