<?php

class Enterprise{    
    
    // Constructor de la clase
    function __construct($razon, $direccion, $telefono, $email){
        $this->razon = $razon;        
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
    }    
       
    // Getters & Seters para acceder a sus atributos.
    function getRazon(){
        return $this->razon;
    }

    function setRazon($razon){
        $this->razon = $razon;
    }

    function getDireccion(){
        return $this->direccion;
    }

    function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    function getTelefono(){
        return $this->telefono;
    }

    function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    function getEmail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email = $email;
    }
    
} // Fin Clase