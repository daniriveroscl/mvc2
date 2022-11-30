<?php
namespace App\Controllers;

use App\Models\Jugador;
/**
*
*/
class JugadorController
{

    function __construct()
    {
        // echo "En JugadorController";
    }

    public function index()
    {

        //buscar datos
        $jugadores = Jugador::all();
        //pasar a la vista
        require "../app/views/jugador/index.php"; 

       
    }

    public function create()
    {
        require "../app/views/jugador/create.php";
    }

    public function edit($arguments)
    {
        $id = (int) $arguments[0];
        $jugador = Jugador::find($id);
        require '../app/views/jugador/edit.php';
    }
    
    public function update()
    {
        $id = $_REQUEST['id'];
        $jugador = Jugador::find($id);
        $jugador->nombre = $_REQUEST['nombre'];
        $jugador->nacimiento = $_REQUEST['nacimiento'];
        $jugador->puesto = $_REQUEST['puesto'];
        $jugador->save();
        header('Location:/jugador');
    }

    public function store()
    {             
        $jugador = new Jugador();
        $jugador->nombre = $_REQUEST['nombre'];
        $jugador->nacimiento = $_REQUEST['nacimiento'];
        $jugador->puesto = $_REQUEST['puesto'];
        $jugador->insert();
        header('Location: /jugador');
    }

    public function show($args)
    {
        //args es un array, tomamos el id con uno de estos métodos
        // $id = (int) $args[0];
        list($id) = $args;
        $jugador = Jugador::find($id);
        require('../app/views/jugador/show.php');        
    }

    public function titular($arg)
    {
        // !!  COMPLETAR  !!
        header('Location: /jugador');
    }
    public function titulares()
    {
        // !!  COMPLETAR  !!
        require "../app/views/jugador/titulares.php";        
    }
    public function quitar($arg)
    {
        // !!  COMPLETAR  !!
        header('Location: /jugador/titulares');
    }
}
