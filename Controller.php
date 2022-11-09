<?php
    require_once "Product.php"; // require_once para importar lo de la clase Product.

    class Controller  
    {
        function __construct()
        {
            // Const vacío      
        }

        // Función que:
            // Recoge todos los productos
            // Llama a vista de inventario
        public function home(){
            $products = Product::all(); // Se llama a la clase y el nombre del método.  
            require "views/home.php";
        }

        // Función que:
            // Recupera un producto en particular, id como parámetro.
            // Llama a vista de un producto en concreto.
        public function show(){
            $id = $_GET["id"];
            $product = Product::find($id); // Vendrá de start.php
            require "views/show.php";
        }
    }// Fin clase
    