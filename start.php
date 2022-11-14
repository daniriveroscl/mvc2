<?php
    // CONTENIDO PRIVADO
    // También llamado ENRUTADOR
    
    // /recurso/acción/parámetro
        // recurso: controladores
        // acción: métodos del controlador. Ej: controlador->show()
        // parámetros:  Ej: find-> id del producto

    require_once "core/App.php";

    $app = new App(); // Crea un objeto de App

