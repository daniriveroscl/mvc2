<?php
    // Desde demo > credenciales
    class Login {

        protected $nombreusu = null; // Se debe llamar igual que la columna
        protected $password = null;

        // Recuperar filas:
        /**
         *  1-  Preparar la consulta -> prepare()
         *  2-  Establecer el modo de recuperación: FETCH_CLASS, FETCH_ASSOC
         *  3-  Ejecutar la consulta -> excute()
         *  4-  Recuperar los registros: fetch(un registro) / fetchAll(devuelve todos los registros)
         */

        // Muestra todo...
        public static function all(){
            $dsn = "mysql:host=db;dbname=demo";
            $usuario = "dbuser";
            $password = "secret";

            try {
                $db = new PDO($dsn,$usuario,$password);
                //Establece el nivel de error que muestra en la conexión
                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM credenciales";
                $sentencia = $db->prepare($sql);

                // PUNTO 2
                // Establece la forma de recuperar registros
                $sentencia->setFetchMode(PDO::FETCH_CLASS,"Login");

                // PUNTO 3
                $sentencia->execute();

                // PUNTO 4

                // Recupera un solo registro
                /*while($obj = $sentencia->fetch()){
                    // print_r($obj);
                    // Muestra atributos de la clase
                    echo "<br>NOMBRE: " . $obj->nombreusu; 
                    echo "<br>CONTRASEÑA: " . $obj->password; 
                }*/

                // Recupera todos los registros (Mediante array de objetos)
                $credenciales = $sentencia->fetchAll(PDO::FETCH_CLASS,"Login"); 
                foreach ($credenciales as $credencial) {
                    echo "<br>NOMBRE: " . $credencial->nombreusu; 
                    echo "<br>CONTRASEÑA: " . $credencial->password; 
                }


            } catch (PDOException $e) {
                echo "<br>Error conexión: " . $e->getMessage();
            }
        } // Fin_all

    } // Fin clase

    echo "<h2>Recuperando registros de Login</h2>";
    Login::all();