<?php

// Clase que administra las vistas de home y agenda.

class HomeController{

    function __construct(){
        // Constructor vacío.
    }

    // Función que controla nuestro índice.
    function index(){
        require "../views/indice.php";
    }

    // Función que controla la vista de la agenda.
    // En el caso de que se haya conectado, se redirige al menú de la agenda.
    // Si no, se redirige a login otra vez.
    function agenda(){
        session_start();

        if(isset($_SESSION["credenciales"])){
            require "../views/agenda.php";
        }else{
            header("Location: ../login");
        }        
    } // Fin Función

} //Fin Clase