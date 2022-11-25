<?php

namespace Core;
require_once "../config/db.php";
use const Config\DSN;
use const Config\USER;
use const Config\PASSWORD;

use PDO;
use PDOException;

class Model {
    protected static function db(){
        $dsn = "mysql:dbname=mvc;host=db";
        $usuario = "root";
        $contraseña = "password";
        try {
            $db = new PDO(DSN, USER, PASSWORD);
            $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $db;
    }
}