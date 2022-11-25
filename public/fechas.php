<?php

    // Horas (En segundos, desde 1970)
    echo "<br>La hora es: " . time(); 

    echo "<br>La hora en un mes: " . strtotime("+1 month");


    // Fechas: date, Datetime

     // date
    echo "<br>La fecha: " . date("d/F/y");

     // Fecha y hora actual
    $fecha = new DateTime("now");
    echo "<br><br>";
    var_dump($fecha);

     // Fecha y hora dentro de 11 semanas
    $fecha = new DateTime("+11 weeks");
    echo "<br><br>";
    var_dump($fecha);

      // Fecha y hora salida por ECHO
    $fecha = new DateTime("+11 weeks");
    echo "<br><br>Intento de fecha: " . $fecha->format("d-M-Y");
    echo " &nbsp ";
    var_dump($fecha);

     // Fecha personalizada
    echo "<br><br>Mi fecha personalizada: ";
    $mifecha = DateTime::createFromFormat("d/m/Y","12/10/2018");
    echo " &nbsp ";
    var_dump($mifecha);
    echo "<br><br>Fecha en español: " . $mifecha ->format("j-n-Y");
 