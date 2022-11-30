<?php
namespace App\Models;

use PDO;
use DateTime;
use Core\Model;

class Jugador extends Model
{
    public function __construct()
    {
        $this->nacimiento = \DateTime::createFromFormat('Y-m-d H:i:s', $this->nacimiento);
        /*$this->id = $id;
        $this->nombre = $nombre;
        $this->puesto = $puesto;*/
    }

    public static function find($id) 
    {
        $db = Jugador::db();
        $stmt = $db->prepare('SELECT * FROM jugadores WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, Jugador::class);
        $jugador = $stmt->fetch(PDO::FETCH_CLASS);
        return $jugador;
    }    
    public static function all()
    {
        $db = Jugador::db();
        $statement = $db->query("SELECT * FROM jugadores");
        $jugadores = $statement->fetchAll(PDO::FETCH_CLASS, Jugador::class);
        return $jugadores;
    }

    public function insert()
    { 
        $db = Jugador::db();
        $stmt = $db->prepare('INSERT INTO jugadores(nombre, nacimiento, puesto) VALUES(:nombre, :nacimiento, :puesto)');
        $stmt->bindValue(':nombre', $this->nombre);
        $stmt->bindValue(':nacimiento', $this->nacimiento);
        $stmt->bindValue(':puesto', $this->puesto);
        return $stmt->execute();

    }

    public function save()
    {
        // !!  COMPLETAR  !!
    }

    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;
    }
    function getNombre(){
        return $this->nombre;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function getPuesto(){
        return $this->puesto;
    }
    function setPuesto($puesto){
        $this->puesto = $puesto;
    }
     function getNacimiento(){
        return $this->nacimiento;
    }
    function setNacimiento($nacimiento){
        $this->nacimiento = $nacimiento;
    }

















}