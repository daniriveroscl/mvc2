<?php
    // CONTENIDO PRIVADO
    // También llamado ENRUTADOR
    
    // /recurso/acción/parámetro
        // recurso: controladores
        // acción: métodos del controlador. Ej: controlador->show()
        // parámetros:  Ej: find-> id del producto

    require_once "../Controller.php";

    $app = new Controller();

    // Defino variable de petición en la url

    // 1- Recoger el método que pasan como parámetro y si no
    // especifican ningún cargador, se aplica el método home()
    if (isset($_GET["method"])) {
        $method = $_GET["method"];  // Poner en la url. Ej http://mvc.local/?method=show&&id=3
    } else {
        $method = "home";
    }

    // 2-Verificar que el método introducido existe
    if (method_exists($app,$method)) {
        $app->$method();
    }else {
        http_response_code(404);
        die("Método no encontrado"); // equivale al exit()
    }

    