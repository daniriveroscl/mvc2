<?php
    namespace Dwes\Galaxias\Pegaso;

    const RADIO = 0.25; //Millones de años luz

    function observar ($mensaje){
        echo "<br>Estoy dirigiendome a la galaxia " . $mensaje;
    }

    class Galaxia {

        function __construct()
        {
            $this->nacimiento();
        }

        function nacimiento()
        {
            echo "<br>Nueva Galaxia";
        }

        static function muerte()
        {
            echo "<br>Galaxia Destruida =(";
        }


    }