<?php
    
    class HomeController {

        function __construct()
        {
            //echo "<br>Constructor clase HOMECONTROLLER";
        } // fin constructor

        function index(){ // MÉTODO POR DEFECTO
            echo "<br>Dentro de index de HOMECONTROLLER";
            require "../app/views/home.php";
        } // fin index. Método home()

        function home(){
            echo "<br>Dentro de home de HOMECONTROLLER";
        } // fin home. Método home()


    }