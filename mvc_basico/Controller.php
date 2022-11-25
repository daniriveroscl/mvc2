<?php
// CONTROLADOR de la app
// Capa de negocios o parte lógica.
// Recibe las peticiones del cliente y actua con el resto de capas.

require_once('User.php');

class Controller  
{
    public function index()
    {
        $users = User::all(); // Usa la función MOSTRAR TODOS LOS USUARIOS
        // echo json_encode($users);
        require('views/index.php');
    }
    public function show()
    {
        $id = $_GET['id'];
        $user = User::find($id); // Usa la función MOSTRAR USUARIO POR ID
        // echo json_encode($user);
        require('views/show.php');
    }
}