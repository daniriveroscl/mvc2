<?php

class User{

    // Constructor de la clase
    function __construct($nombre, $apellidos, $direccion, $telefono){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

} // Fin Clase