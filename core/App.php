<?php

    /* - Si la url no especifica ningún controlador(recurso) => asigno uno por defecto (home) 
       - Si la url no especifica ningún método => asigno por defecto index

       /recurso/accion/parámetros
    */

    class App  
    {
        function __construct()
        {
            if (isset($_GET["url"]) && !empty($_GET["url"])) {
                $url = $_GET["url"];
            }else {
                $url = "home";
            }
            // url:/recurso/accion/parámetros

            // url:/product/show/5 -> product:recurso ; show:acción ; 5:parámetro
            $arguments = explode('/', trim($url,'/')); // Trocea la url(cadena) en palabras
            $controllerName = array_shift(($arguments)); // product. Extrae y elimina primer elemento del array.
            $controllerName = ucwords($controllerName) . "Controller"; // Para definir nombre del controlador : "ProductController"
            if (count($arguments)) {
                $method = array_shift(($arguments)); // show. Se coge la segunda palabra de la url
            }else {
                $method = "index";
            }


            // Cargar el controlador desde una ruta. "ProductController.php"
            $file = "../app/controllers/$controllerName"  . ".php";
            //var_dump($file);
            //die;
            if (file_exists($file)) {
                require_once $file; // Importa el fichero si existe
            }else {
                http_response_code(404);
                die("Error 404.No encontrado"); // Mensaje en la página.
            }

            // Existe el método en el controlador??
            $controllerObject = new $controllerName; // Crea un objeto de controllerName
            if (method_exists($controllerObject,$method)) {
                $controllerObject->$method($arguments); // Si existe, llama al método con sus parámetros(argumentos). 
            }else {
                http_response_code(404);
                die("Error 404.No encontrado"); // Mensaje en la página.
            }



        }// fin construct


    }// fin App
    