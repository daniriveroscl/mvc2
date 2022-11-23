<?php
    namespace App\Controllers;

    use \App\Models\Product;
    use Dompdf\Dompdf;
   // require "../Product.php";

    class ProductController {

        function __construct()
        {
            echo "<br>Constructor clase PRODUCTCONTROLLER";
        } // fin constructor

        function index(){ // MÉTODO POR DEFECTO
            //echo "<br>Dentro de index de PRODUCTCONTROLLER";
            $products = Product::all();
            require "../app/views/product.php";
        } // fin index. Método home()

        function show(){
           //echo "<br>Dentro de show de PRODUCTCONTROLLER";
           $id = $_GET["id"];
           $product = Product::find($id);
            require "../app/views/show.php";
        } // fin show. Método show()

        function pdf (){
            //include_once "./vendor/autoload.php";
     
            $dompdf = new Dompdf();
            $dompdf->loadHtml('<h1>Hola mundo</h1><br><a href="https://parzibyte.me/blog">By Parzibyte</a>');
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=documento.pdf");
            $dompdf->render();
            $dompdf -> stream();
        }

     


    }