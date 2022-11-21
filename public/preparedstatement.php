<?php

    $dsn = "mysql:dbname=demo;host=db";
    $usuario = "dbuser";
    $password = "secret";

    /** 
     * 1-   Preparar la consulta -> prepare
     * 2-   Vincular los datos -> bindParam / bindValue
     * 3-   Ejecutar la sentencia -> excecute(); (query, exec)
     */

    try {
        $db = new PDO($dsn, $usuario,$password);
        //Establece el nivel de error que muestra en la conexión
        $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        // Preparación por nombre
        // $sentencia = $db -> prepare("INSERT INTO credenciales (nombreusu,password) VALUES(:nombre,:clave)");

        // Preparación por posición
        $sentencia = $db -> prepare("INSERT INTO credenciales (nombreusu,password) VALUES(? , ?)");
        $nombre = "Dante";
        $clave1 = "69";
        // bindParam. Coge los últimos valores
        $sentencia->bindParam(1,$nombre); // Asocia ese parámetro con la variable. APUNTADOR
        $sentencia->bindParam(2,$clave1);

        // bindValue. Coge los valores primeros
        //$sentencia->bindValue(":nombre",$nombre);
        //$sentencia->bindValue(":clave",$clave1);

        $nombre = "Herni";
        $clave1 = "89";
        $sentencia->execute(); // Ejecuta la sentencia
        // Primero probar en mvc.local/prepared...
        // Segundo, mirar en phpmyadmin si se creó nombre y clave

        echo "<h2>Exitos</h2>";
    } catch (PDOException $e) {
        echo"Error producido al conectar: " . $e->getMessage();
    }