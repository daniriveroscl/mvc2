<?php

    namespace App\Models;

    use PDO;
    use Core\Model;
    use DateTime;

    require_once "../core/Model.php";

        // Extendemos clase model de conection

    class Product extends Model{

        function __construct()
        {
            $this->fechaCompra = DateTime::createFromFormat("Y-m-d", $this->fechaCompra);
        }

        public static function all(){
            $db = Product::db();
            $statement = $db->query("SELECT * FROM products");
            $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);

            return $products;
        }

        public static function find($id){
            $db = Product::db();
            $statement = $db->prepare("SELECT * FROM products WHERE id = id");
            $statement-> execute(array(":id" => $id));
            $statement-> setFetchMode(PDO::FETCH_CLASS, Product::class);
            $products = $statement->fetch(PDO::FETCH_CLASS);
            return $products;
        }

        public function insert(){
            $db = Product::db();
            $statement = $db->prepare("INSERT INTO products(id, name, type_id, price, fechaCompra");
            //$statement->bindValue((":id", $this->id));
        }

        public function delete(){ //TODO 

        }

        public function save(){ //TODO 

        }

    }