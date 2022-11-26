<?php
    // CONTENIDO PRIVADO
    // También llamado ENRUTADOR
    
    // /recurso/acción/parámetro
        // recurso: controladores
        // acción: métodos del controlador. Ej: controlador->show()
        // parámetros:  Ej: find-> id del producto

    //Importamos el creador de controladores generico
    require_once "core/App.php";

    $app = new \Core\App(); // Crea un objeto de App para acceder a los métodos.

