<?php
    namespace App\Controllers;
    require "../Product.php";

    class ProductController {

        function __construct()
        {
            echo "<br>Constructor clase PRODUCTCONTROLLER";
        } // fin constructor

        function index(){ // MÉTODO POR DEFECTO
            //echo "<br>Dentro de index de PRODUCTCONTROLLER";
            $products = \Product::all();
            require "../app/views/product.php";
        } // fin index. Método home()

        function show(){
           //echo "<br>Dentro de show de PRODUCTCONTROLLER";
           $id = $_GET["id"];
           $product = \Product::find($id);
            require "../app/views/show.php";
        } // fin show. Método show()


    }