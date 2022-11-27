<?php

// Clase que administra las operaciones de login.

class LoginController {

    function __construct(){
        // Constructor vacío.
    }

    // Función que controla la vista de login.
    function index(){
        session_start();

        require "../views/login/login.php";
    } // Fin Función
    

    // Función que verifica si las credenciales insertadas son válidas para conectarse.
    // Inserta el fichero conexión.php a nuestra base de datos y conecta con la base de datos de "agenda".
    // Las credenciales se obtienen del formulario login.php mediante el método post.
    // Mediante la sentencia SQL SELECT se busca en la tabla "credenciales" los datos del usuario.
    // Si el usuario y contraseña que introduce el usuario son válidos, se crea una sesión con los datos y se redirige al apartado home.
    function auth(){           

        require "../core/Connection.php";

        $db = Connection::db();

        $usuario = $_POST["user"];
        $contra = $_POST["pass"];            
                
        $buscar = "SELECT * FROM credenciales WHERE usuario ='" . $usuario . "'";

        foreach ($db->query($buscar) as $dato) {
            $usuarioCheck = $dato[0];
            $contraCheck = $dato[1];                        
        }

        if($usuarioCheck == $usuario && password_verify($contra, $contraCheck)){
            session_start();

            $datos = [$usuario, $contraCheck];
            $_SESSION["credenciales"] = $datos;

            header ("refresh:2; /home");
            echo "Conectado con éxito. Redirigiendo...";
        }else{
            echo "Usuario o contraseña incorrectos. Pruebe otra vez.";
            echo "<br><a href='/login'>Volver atrás.</a>";            
        }  

    } // Fin Función


    // Función que desconecta al usuario actual.
    // Se borra la sesión.
    // Si no está conectado previamente, se redirige a login.
    function logout(){

        session_start();

        if(isset($_SESSION["credenciales"])){

            $_SESSION = array();
            session_destroy();

            setcookie(session_name(),"", time() -200, '/');
            header("Location: /home");
            
        }else{
            header("Location: /login");
        } 
        
    } // Fin Función

} //Fin Clase