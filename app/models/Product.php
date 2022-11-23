<?php

namespace App\Models;

    // Fichero que simula el MODELO con datos.
    class Product {
        // constantes en mayúsculas
        const PRODUCTS = [
            array(1,'Cortacesped'),
            array(2,'Boli'),
            array(3,'Cuaderno'),
            array(4,'Diana'),
        ];

    function __construct() {/* constructor vacío */ } 

    // Devuelve el array con los productos
    // static para acceder desde otra clase a esa función.
    public static function all()
    {
        return Product::PRODUCTS; 
    }

    // Devuelve un producto en concreto
    public static function find($id)
    {
        return Product::PRODUCTS[$id-1]; // -1 ya que los arrays comienzan en 0
    }


    } // Fin de la clase