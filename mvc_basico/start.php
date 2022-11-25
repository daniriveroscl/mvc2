<?php
// FICHERO CARGADOR

require_once "Controller.php";

$app = new Controller();

if(isset($_GET['method'])) { // Si se especifica un método.
    $method = $_GET['method'];
} else {
    $method = 'index';  // Si NO se especifica un método.
}

try {
    if(method_exists($app, $method)) {
        $app->$method();
    } else {
        throw new Exception("No encontrado");
    }
} catch (\Throwable $th) {
    http_response_code(404);
    echo $th->message;
}