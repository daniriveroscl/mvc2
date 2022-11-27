<?php

// Clase que administra las operaciones de la agenda de los contactos de personas.

class UserController{

    function __construct(){
        // Constructor vacío.
    } 
    function index(){        
        require "../views/user/MenuPersona.php";
    }
    function personaNueva(){
        require "../views/user/PersonaNueva.php";
    }
    function eliminarPersona(){
        require "../views/user/EliminarPersona.php";
    }
    function modificarPersona(){
        require "../views/user/ModificarPersona.php";
    }
    function buscarPersona(){
        require "../views/user/BuscarPersona.php";
    }
    function showAll(){
        require "../views/user/MostrarTodo.php";
    }

    // Función que AÑADE un nuevo contacto de persona a la agenda.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Los datos se obtienen desde el formulario PersonaNueva.php mediante el método post.
    // Comprueba además si el nombre de persona existe mediante sentencia SQL SELECT.
    // Si el nombre no existe lo pone en mayúsculas y lo inserta en la base de datos con la sentencia SQL INSERT INTO.
    // En el caso de que ya exista, no lo inserta.
    function insertar(){

        require "../core/Connection.php";

        $db = Connection::db(); 
        
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];         
        
    
            $buscar = "SELECT * FROM persona WHERE Nombre ='" . strtoupper($nombre) . "' and Apellidos='" . strtoupper($apellidos) . "'";
        
            if($db->query($buscar)->rowCount() > 0){
                echo "el contacto ya existe. Escriba nombre y apellidos diferentes";
                echo "<a href='/home/agenda'>Volver a agenda.</a>";
            }else{
                $sql = "INSERT INTO persona VALUES ('" . strtoupper($nombre) . "', '" . strtoupper($apellidos) . "', '" . strtoupper($direccion) . "', " . $telefono . ");";
                $filasAfectadas = $db->query($sql);
        
                if($filasAfectadas->rowCount() > 0){                
                    echo "<br>Contacto guardado con éxito."; 
                    echo "<br><a href='/home/agenda'>Volver a agenda.</a>";            
                }else{
                    echo "<br>Error al guardar el contacto.";
                    echo "<br><a href='/home/agenda'>Volver a agenda.</a>";
                }
            } 

    } // Fin Función


    // Función que ELIMINA un contacto de persona en la agenda.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Los datos se obtienen desde el formulario EliminarPersona.php mediante el método get.
    // El nombre y apellidos de la persona se convierten a mayúsculas y se ejecuta la sentencia SQL DELETE FROM para eliminar el contacto.
    function eliminar(){

        require "../core/Connection.php";

        $db = Connection::db();

        $nombre = strtoupper($_GET["nombre"]);
        $apellidos  = strtoupper($_GET["apellidos"]);
        
        $sql = "DELETE FROM persona WHERE Nombre = '" . $nombre . "' and Apellidos='" . $apellidos . "'";
        $filasAfectadas = $db->query($sql);

        if($filasAfectadas->rowCount() > 0){
            echo "<br>Contacto eliminado con éxito de la agenda."; 
            echo "<br><a href='/home/agenda'>Volver a agenda.</a>";            
        }else{
            echo "<br>Error al eliminar el contacto de la agenda.";
            echo "<br><a href='/home/agenda'>Volver a agenda.</a>";
        }
    } // Fin Función


    // Función que MODIFICA datos de un contacto de persona de la agenda.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Mediante el nombre y apellidos busca la persona .
    // Los datos se obtienen desde el formulario Modificarpersona.php mediante el método post.
    // Se aplica una sentencia de búsqueda de tipo SELECT en la tabla de personas.
    // Recorre la persona con sus datos mediante bucle foreach.
    // Si se encuentra la persona, se aplica una sentencia de actualización de tipo UPDATE, modificando uno o más datos del contacto.
    // Se tiene que modificar al menos un dato.
    // Si no se encuentra el contacto con el nombre dado, se pedirá que se introduzca otro nombre válido.
    function modificar(){

        require "../core/Connection.php";

        $db = Connection::db();

        $nombreBuscado = strtoupper($_POST["nombreModificar"]);
        $apellidosBuscados = strtoupper($_POST["apellidosModificar"]);        
        
       
            $buscar = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscado . "' and Apellidos='" . $apellidosBuscados . "'";
        
            foreach ($db->query($buscar) as $dato) {
                $nombre = $dato[0];           
                $apellidos = $dato[1];           
                $direccion = $dato[2];
                $telefono = $dato[3];                       
            }
       
            if(isset($_POST["nombre"]) && !empty($_POST["nombre"])){
                $nombre = strtoupper($_POST["nombre"]);          
            }
            if(isset($_POST["apellidos"]) && !empty($_POST["apellidos"])){
                $apellidos = strtoupper($_POST["apellidos"]);     
            }
            if(isset($_POST["direccion"]) && !empty($_POST["direccion"])){
                $direccion = strtoupper($_POST["direccion"]);   
            }
            if(isset($_POST["telefono"]) && !empty($_POST["telefono"])){
                $telefono = $_POST["telefono"];    
            }
       
            if(empty($_POST["nombre"]) && empty($_POST["apellidos"]) && empty($_POST["direccion"]) && empty($_POST["telefono"])){
                echo "Los campos de datos están vacíos.<br>Rellena al menos uno.";
                echo "<br><a href='/user/modificarPersona'>Volver atrás</a>";
            }else{       
                $sql = "UPDATE persona SET Nombre='" . $nombre . "', Apellidos='" . $apellidos . "', Direccion ='" . $direccion . "', Telefono=" . $telefono . " WHERE Nombre ='" . $nombreBuscado . "' and Apellidos='" . $apellidosBuscados . "'"; 
                $filasAfectadas = $db->query($sql);        

                if($filasAfectadas->rowCount() > 0){                
                    echo "<br>Contacto modificado con éxito."; 
                    echo "<br><a href='/home/agenda'>Volver a agenda.</a>";            
                }else{
                    echo "<br>Error al modificar el contacto de la agenda. El contacto no existe o está mal escrito.";
                    echo "<br><a href='/user/modificarPersona'>Volver atrás</a>";
                }
            }

    } // Fin Función


    // Función que MUESTRA los datos de UNA persona mediante su nombre y apellidos.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // El nombre y los apellidos los convierte a mayúsculas.
    // Busca la persona con la sentencia SQL SELECT.
    // Se recorre mediante un bucle foreach la sentencia a buscar.
    // Se muestra el resultado de los datos de la persona.
    static function show($nombre, $apellidos){

        require "../core/Connection.php";

        $db = Connection::db();

        $nombreBuscado = strtoupper($nombre);
        $apellidosBuscados = strtoupper($apellidos);      
        
        if($apellidosBuscados == ""){ // Si no introduce apellidos
            $buscar = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscado . "'";        
        }else{
            $buscar = "SELECT * FROM persona WHERE Nombre ='" . $nombreBuscado . "' and Apellidos = '" . $apellidosBuscados . "'";
        }  
                   
        if($db->query($buscar)->rowCount() > 0){       
            foreach ($db->query($buscar) as $dato) {
                echo "<b>Datos del contacto:</b> ";
                echo "<br>Nombre: " . $dato[0];
                echo "<br>Apellidos: " . $dato[1];
                echo "<br>Dirección: " . $dato[2];
                echo "<br>Teléfono: " . $dato[3];
                echo "<br><br>";    
            }   
        }else{
            echo "<br>Contacto no encontrado.<br>Por favor, escriba otro nombre y apellidos diferentes.";            
        }
        
    } // Fin Función


    // Función que MUESTRA TODOS los contactos de personas con sus respectivo datos.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Se buscan los contactos mediante la sentencia SQL SELECT.
    // Se recorre mediante un bucle foreach la sentencia a buscar.
    // Se muestra el resultado de los datos de las personas.
    static function mostrarTodo(){

        require "../core/Connection.php";

        $db = Connection::db();      
                
        $buscar = "SELECT * FROM persona";
        $personas = $db->query($buscar);
                
        if($personas->rowCount() > 0){            
            $numPersona = 1;
            foreach ($personas as $dato) {
                echo "<b>Contacto: " . $numPersona . "</b>";
                echo "<br>Nombre: " . $dato[0];
                echo "<br>Apellidos: " . $dato[1];
                echo "<br>Dirección: " . $dato[2];
                echo "<br>Teléfono: " . $dato[3];
                echo "<br><br>";
                $numPersona++;            
            }                        
        }
    } // Fin Función

} // Fin Clase