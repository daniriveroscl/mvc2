<?php

// Clase que importa ficheros xml.

class FilesController{

    function __construct(){
        // Constructor vacío.
    }

    // Función que inserta datos en nuestra base de datos mediante ficheros .xml
    // Carga el fichero agenda.xml de nuestro directorio.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Mediante un bucle foreach se obtienen los datos del fichero xml.
    // Hacemos dos tipos de variable de dato: "persona" y "empresa".
    // Si es de tipo persona, se aplica la función reemplazar() para omitir los acentos.
    // Se busca en la base de datos los datos que vamos a importar.
    // Si están no se vuelven a insertar.
    // Mismo caso se aplica para importar datos de empresa.
    function importar(){
        
        libxml_use_internal_errors(true);

        $datos = simplexml_load_file("../agenda.xml");
        
        require "../core/Connection.php";
        
        foreach($datos->contacto as $dato){            
            
            if ($dato["tipo"]=="persona"){
                
                $db = Connection::db(); 
                                     
                $nombre = $this->reemplazar($dato->nombre);
                $apellidos = $this->reemplazar($dato->apellidos);
                $direccion = $this->reemplazar($dato->direccion);
                $telefono = $dato->telefono; // Es un número   
                    
                $buscar = "SELECT * FROM persona WHERE Nombre ='" . strtoupper($nombre) . "' and Apellidos='" . strtoupper($apellidos) . "' and Direccion ='" . strtoupper($direccion) . "' and Telefono=" . $telefono;
                $filasAfectadas = $db->query($buscar);

                if($filasAfectadas->rowCount() > 0){
                       // Sin cuerpo para acomodar el código siguiente.
                } else {
                    $sql = "INSERT INTO persona VALUES ('" . strtoupper($nombre) . "', '" . strtoupper($apellidos) . "', '" . strtoupper($direccion) . "', " . $telefono . ");";
                    $db->query($sql);
                }
                } else { 

                    $db = Connection::db(); 
        
                    $razon = $this->reemplazar($dato->nombre);                
                    $direccion = $this->reemplazar($dato->direccion);
                    $telefono = $dato->telefono; 
                    $email = $this->reemplazar($dato->email);      
                    
                    $buscar = "SELECT * FROM empresas WHERE RazonSocial ='" . strtoupper($razon) . "' and Direccion ='" . strtoupper($direccion) . "' and Telefono=" . $telefono . " and Email='" . strtoupper($email) . "'";
        
                    if($filasAfectadas->rowCount() > 0){
                        // Sin cuerpo para acomodar el código siguiente.
                    } else {
                    $sql = "INSERT INTO empresas VALUES ('" . strtoupper($razon) . "', '" . strtoupper($direccion) . "', " . $telefono . ", '" . strtoupper($email) . "');";
                    $db->query($sql);
                    }
                }
            }
            header ("refresh:2; /home/agenda");
            echo "Los datos se han importado con éxito.<br>Volviendo a la agenda...";  
    } // Fin Función

    // Función que devuelve una palabra insertada por parámetro sin acentos.
    function reemplazar($palabra){
        $buscar  = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú');
        $reemplazar = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u');
        $resultado = str_replace($buscar, $reemplazar, $palabra);
        
        return $resultado;
    } // Fin Función
    
} // Fin Clase