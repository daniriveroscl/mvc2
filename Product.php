<?php
    // Fichero que simula el modelo con datos
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
    public static function all()
    {
        return Product::PRODUCTS; 
    }

    // Devuelve un producto en concreto
    public function fin($id)
    {
        return Product::PRODUCTS[$id-1]; // -1 ya que los arrays comienzan en 0
    }


    }