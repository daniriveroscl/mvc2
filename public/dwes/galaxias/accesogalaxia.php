<?php

    // PASO Nº1
    namespace Dwes\Galaxias;

    echo "<br>Namespace actual : " . __NAMESPACE__;

    /* TRES FORMAS DE DIRECCIONAR
        1- Sin direccionamiento
        2- Direccionamiento relativo
        3- Direccionamiento absoluto
    */

    // PASO Nº2 (INCLUDE)
    include "galaxia1.php";
    
    echo "<h2>Sin direccionamiento</h2>";
   

    echo "<br>Radio de la galaxia " . RADIO;
    observar("Vía Láctea");
    $gl = new Galaxia(); // Se imprime automaticamente la función nacimiento()
    Galaxia::muerte();


    echo "<h2>Direccionamiento relativo</h2>"; // Se trabaja desde mi ubicación actual
    include "pegaso/pegaso.php";

    echo "<br>Radio de la galaxia " . Pegaso\RADIO;
    Pegaso\observar("Pegaso");
    $gl = new Pegaso\Galaxia(); // Se imprime automaticamente la función nacimiento()
    Pegaso\Galaxia::muerte();

   
    echo "<h2>Direccionamiento Absoluto</h2>"; // Se trabaja desde la ubicación raiz

    echo "<br>Radio de la galaxia " . \Dwes\Galaxias\Pegaso\RADIO;
    \Dwes\Galaxias\Pegaso\observar("Pegaso");
    $gl = new \Dwes\Galaxias\Pegaso\Galaxia(); // Se imprime automaticamente la función nacimiento()
    \Dwes\Galaxias\Pegaso\Galaxia::muerte();


    // PASO Nº3 (USES)

    // Útil para utilizar elementos individuales
    // Tres formas
    use const \Dwes\Galaxias\Pegaso\RADIO; 
    use function \Dwes\Galaxias\Pegaso\observar;
    use \Dwes\Galaxias\Galaxia;

    echo "<h2>Formas use</h2>";

    echo "<br>El radio es: " . RADIO;
    echo "<br>Observo en pegaso " . observar("Otra galaxia");
    echo "<br>Objeto de galaxia genérico: " . new Galaxia();

    // Apodar namespace -> alias
    use \Dwes\Galaxias\Pegaso\Galaxia as Seiya;
    use \Dwes\Galaxias\Galaxia as Andromeda;

    echo "<br><br>";
    $pg = new Seiya();
    $andr = new Andromeda();

    //Andromeda\observar(("Observando a Andromeda"));
    //Seiya\observar("Observando a Seiya");

    