<?php
    namespace App\Controllers;
    
    require "../Product.php";
    use App\Models\Product;

    class ProductController {

        function __construct()
        {
            echo "<br>Constructor clase PRODUCTCONTROLLER";
        } // fin constructor

        function index(){ // MÉTODO POR DEFECTO
            //echo "<br>Dentro de index de PRODUCTCONTROLLER";
            $products = Product::all();
            //require "../views/product.php";
        } // fin index. Método home()

        function show($args){
           //echo "<br>Dentro de show de PRODUCTCONTROLLER";
           list($id) = $args;
           $product = Product::find($id);
            //require "../views/show.php";
            //args es un array, tomamos el id con uno de estos métodos
            // $id = (int) $args[0];
           require('../app/views/show_product.php');        

        } // fin show. Método show()


    }// Fin de clase