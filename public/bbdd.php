<?php
  require "../bbddcon.php"; // Forma simple de pensar

  //  /recurso/metodo/parametro1/parametro2 Forma correcta de pensar
  //      /recurso -> es el controlador
  //      /métodos -> Métodos o funciones dentro del controlador

  // el Patrón es una serie de pasos que si los ejecuto de una manera específica voy a tener un resultado óptimo
  // En este caso es el MVC (Modelo/Vista/Controlador)
    //  El modelo tiene datos (bases de datos)
    //  La vista son la parte gráfica (las páginas web a las que el usuario accede)


        $sql = "SELECT nombreusu,password FROM credenciales"; // Consulta de muestra
        $registros = $bd -> query($sql); // Ejecuta la consulta
        echo "<br>Número de registros devueltos: " . $registros->rowCount();
        if ($registros->rowCount() > 0) {
          foreach ($registros as $fila) {
            echo "<br>Nombre de usuario: " . $fila["nombreusu"];
            echo "<br>Password: " . $fila["password"]; // password tiene que ir CIFRADA SIEMPRE
          }
        }else {
            echo"<br>No se ha devuelto ninguna fila";
        }

   