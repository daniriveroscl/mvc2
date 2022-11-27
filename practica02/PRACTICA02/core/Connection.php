<?php
 
    // Clase que permite conectar con la base de datos.
    // Devuelve una variable que hará falta para poder ejecutar sentencias SQL mediante conexión.
    class Connection{

        static function db(){

            $dsn = "mysql:dbname=agenda;host=db"; 
            $usuario = "root";
            $password = "password";

            try {
                $db = new PDO($dsn, $usuario, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Error de conexión: ' . $e->getMessage();
            }
            return $db;
            
        } // Fin Función

    } // Fin Clase