<?php

 // Clase que administra las opciones de la agenda de contactos de empresas.
 
class EnterpriseController{

    function __construct(){
        // Constructor vacío.
    } 
    function index(){        
        require "../views/enterprise/MenuEmpresa.php";
    }
    function empresaNueva(){
        require "../views/enterprise/EmpresaNueva.php";
    }
    function eliminarEmpresa(){
        require "../views/enterprise/EliminarEmpresa.php";
    }
    function modificarEmpresa(){
        require "../views/enterprise/ModificarEmpresa.php";
    }
    function buscarEmpresa(){
        require "../views/enterprise/BuscarEmpresa.php";
    }
    function showAll(){
        require "../views/enterprise/MostrarTodo.php";
    }
  
    // Función que AÑADE un nuevo contacto de empresa a la agenda.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Los datos se obtienen desde el formulario nuevaEmpresa.php mediante el método post.
    // Comprueba además si el nombre de empresa existe mediante sentencia SQL SELECT.
    // Si el nombre no existe lo pone en mayúsculas y lo inserta en la base de datos con la sentencia SQL INSERT INTO.
    // En el caso de que ya exista, no lo inserta.
    function insertar(){

        require "../core/Connection.php";

        $db = Connection::db(); 
        
        $razon = $_POST["rSocial"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];       
                
        $buscar = "SELECT * FROM empresas WHERE RazonSocial ='" . strtoupper($razon) . "'";
        
        if($db->query($buscar)->rowCount() > 0){
            echo "Este Contacto ya existe.<br>Escriba otro nombre diferente.";
            echo "<a href='/home/agenda'>Volver a la agenda de contactos.</a>";
        } else {
            $sql = "INSERT INTO empresas VALUES ('" . strtoupper($razon) . "', '" . strtoupper($direccion) . "', " . $telefono . ", '" . strtoupper($email) . "');";
            $filasInsertadas = $db->query($sql);
        
            if($filasInsertadas->rowCount() > 0){
                echo "<br>Contacto guardado con éxito."; 
                echo "<a href='/home/agenda'>Volver a la agenda de contactos.</a>";            
            }else {
                echo "<br>Error al añadir el contacto.";
                echo "<br><a href='/home/agenda'>Volver a la agenda de contactos.</a>";
            }
        }  
    } // Fin Función

    // Función que MODIFICA datos de un contacto de empresa de la agenda.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Mediante el nombre o razón social busca la empresa .
    // Los datos se obtienen desde el formulario ModificarEmpresa.php mediante el método post.
    // Se aplica una sentencia de búsqueda de tipo SELECT en la tabla de empresas.
    // Recorre la empresa con sus datos mediante bucle foreach.
    // Si se encuentra la empresa, se aplica una sentencia de actualización de tipo UPDATE, modificando uno o más datos del contacto.
    // Se tiene que modificar al menos un dato.
    // Si no se encuentra el contacto con el nombre dado, se pedirá que se introduzca otro nombre válido.
    function modificar(){

        require "../core/Connection.php";

        $db = Connection::db();

        $nombreEmpresa = strtoupper($_POST["razonModificar"]);                
        
        $buscar = "SELECT * FROM empresas WHERE RazonSocial ='" . $nombreEmpresa . "'";
        $empresa = $db->query($buscar);

        foreach ($empresa as $dato) {
            $razon = $dato[0];
            $direccion = $dato[1];
            $telefono = $dato[2];
            $email = $dato[3];            
        }
       
        if(isset($_POST["rSocialModificar"]) && !empty($_POST["rSocialModificar"])){
            $razon = $_POST["rSocialModificar"];
        }

        if(isset($_POST["direccion"]) && !empty($_POST["direccion"])){
            $direccion = $_POST["direccion"];
        }

        if(isset($_POST["telefono"]) && !empty($_POST["telefono"])){
            $telefono = $_POST["telefono"];
        }

        if(isset($_POST["email"]) && !empty($_POST["email"])){
            $email = $_POST["email"];
        }
        
        if(empty($_POST["rSocialModificar"]) && empty($_POST["direccion"]) && empty($_POST["telefono"]) && empty($_POST["email"])){
            echo "Los campos de datos están vacíos.<br>Rellena al menos uno.";
            echo "<br><a href='/enterprise/modificarEmpresa'>Volver atrás.</a>";
        } else{ 
        $sql = "UPDATE empresas SET RazonSocial='" . strtoupper($razon) . "', Direccion='" . strtoupper($direccion) . "', Telefono =" . $telefono . ", Email='" . strtoupper($email) . "' WHERE RazonSocial='" . $nombreEmpresa . "'"; 
        $filasInsertadas = $db->query($sql);
       
            if($filasInsertadas->rowCount() > 0){                
                echo "<br>Contacto modificado con éxito."; 
                echo "<br><a href='/home/agenda'>Volver a la agenda de contactos.</a>";            
            }else {
                echo "<br>Error al modificar el contacto de la agenda.<br>Pruebe con otro nombre de empresa.";
                echo "<br><a href='/enterprise/modificarEmpresa'>Volver atrás.</a>";
            }
        }
    } // Fin Función 

    // Función que ELIMINA un contacto de empresa en la agenda.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Los datos se obtienen desde el formulario EliminarEmpresa.php mediante el método get.
    // El nombre o razón social de la empresa se convierte a mayúsculas y se ejecuta la sentencia SQL DELETE FROM para eliminar el contacto.
    function eliminar(){

        require "../core/Connection.php";

        $db = Connection::db();

        $razon = strtoupper($_GET["rSocial"]);

        $sql = "DELETE FROM empresas WHERE RazonSocial = '" . $razon . "';";
        $filasEliminadas = $db->query($sql);

        if($filasEliminadas->rowCount() > 0){            
            echo "<br>Contacto eliminado con éxito."; 
            echo "<br><a href='/home/agenda'>Volver a la agenda de contactos.</a>";            
        }else{
            echo "<br>Ha habido un error al eliminar el contacto.<br>Por favor, escriba otro nombre diferente.";
            echo "<br><a href='/home/agenda'>Volver a la agenda de contactos.</a>";
        }
    } // Fin Función

    // Función que MUESTRA TODOS los contactos de empresas con sus respectivo datos.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Se buscan los contactos mediante la sentencia SQL SELECT.
    // Se recorre mediante un bucle foreach la sentencia a buscar.
    // Se muestra el resultado de los datos de las empresas.
    static function mostrarTodo(){

        require "../core/Connection.php";
        
        $db = Connection::db();      
                
        $buscar = "SELECT * FROM empresas";
        $empresas = $db->query($buscar);
                
        if($empresas->rowCount() > 0){            
            $numEmpresa = 1;
            foreach ($empresas as $dato) {
                echo "<b>Datos del contacto:</b> " . $numEmpresa;

                echo "<br>Razón Social: " . $dato[0];
                echo "<br>Dirección: " . $dato[1];
                echo "<br>Teléfono: " . $dato[2];
                echo "<br>Email: " . $dato[3];
                echo "<br><br>";

                $numEmpresa++;            
            }                       
        }
    } // Fin Función

    // Función que MUESTRA los datos de UNA empresa mediante su nombre o razón social.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // El nombre lo convierte a mayúsculas.
    // Busca la empresa con la sentencia SQL SELECT.
    // Se recorre mediante un bucle foreach la sentencia a buscar.
    // Se muestra el resultado de los datos de la empresa.
    static function show($razon){

        require "../core/Connection.php";

        $db = Connection::db();

        $nombreEmpresa = strtoupper($razon);
                
        $buscar = "SELECT * FROM empresas WHERE RazonSocial ='" . $nombreEmpresa . "'";
        $empresa = $db->query($buscar);
        
        if($empresa->rowCount() > 0){
            foreach ($empresa as $dato) {            
                echo "<br><b>Datos del contacto:</b><br>"; 
                
                echo "<br>Razón Social: " . $dato[0];
                echo "<br>Dirección: " . $dato[1];
                echo "<br>Teléfono: " . $dato[2];
                echo "<br>Email: " . $dato[3];
            }                        
        }else{
            echo "<br>Contacto no encontrado.<br>Por favor, escriba otro nombre diferente.";            
        }
    } // Fin Función

} // Fin Clase