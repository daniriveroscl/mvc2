<?php

// Clase que permite el acceso a los controladores.
// Primero, con una condición verifica si en la barra de url hay una url y no está vacía.
// Segundo, la url se trata quitando las barras "/", y se añaden los datos a un array.
// Tercero, la url quedará como primer argumento el nombre del controlador, seguido por el nombre del método, y por último los parámetros del método.
// controlador/método/parámetros
class App{

    // Constructor
    function __construct(){
       
        // Primer paso
        if(isset($_GET["url"]) && !empty($_GET["url"])){
            $url = $_GET["url"];
        }else{
            $url = "home";
        }
        
        // Segundo paso
        $arguments = explode('/', trim($url, '/')); 
        $controllerName = array_shift($arguments);    
        $controllerName = ucwords($controllerName) . "Controller"; 
        

        if(count($arguments) > 0){
            $method = array_shift($arguments);
        }else{
            $method = "index";
        }

        // Se carga el controlador que indique el usuario.
        // Si el fichero del controlador existe, lo carga.
        // En caso contrario, salta un error de fichero y se cierra la app.
        $file = "../app/controllers/$controllerName" . ".php";
        
        if(file_exists($file)){
            require_once $file;
        }else{
            http_response_code(404);
            die("Controlador no encontrado.");
        }

        // Se instancia un objeto del controlador.
        // Se comprueba si el método indicado existe.
        // En caso de que exista, se lanza.
        // En caso de que no exista, salta un error de fichero y se cierra la app.
        $controllerObject = new $controllerName;
        
        if(method_exists($controllerObject, $method)){
            $controllerObject->$method($arguments);

        }else{
            http_response_code(404);
            die("No encontrado.");
        }

    } // Fin constructor

} //Fin Clase