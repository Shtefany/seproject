<?php
if ( !defined("__PRODUCTO__") ){
	define("__PRODUCTO__","");
	include("../php/DataConnection.class.php");
	
	class Producto{
		private $id;
		private $nombre;
		private $precio;

		
		public function __construct($id,$nombre,$precio)
		{
			$this->id = $id;
			$this->nombre = $nombre;
			$this->precio = $precio;
		}
		
		public function getId(){
			return $this->id;
		}	
		public function getNombre(){
			return $this->nombre;
		}
		public function getPrecio(){
			return $this->precio;
		}

		
		public function setId($id){
			$this->id=id;
		}	
		public function setNombre($nombre){
			$this->nombre=nombre;
		}
		public function setPrecio($precio){
			$this->precio=precio;
		}
	
		
		public function Agregar(){
			$db = new DataConnection();
			$query="Insert into producto (Nombre,Precio) values('".$this->nombre."',".$this->precio.")";
			$db->executeQuery($query);
			return $db;
		}
		
		public function findByName(){
			$db = new DataConnection();
			$result=$db->executeQuery("Select * from producto where Nombre='".$this->nombre."'");
			if ( $dato = mysql_fetch_assoc($result) ){
				$productoFound = new Producto($dato["idProducto"],$dato["Nombre"],$dato["Precio"]);
				return $productoFound;
			}
			return false;	
		}
		
		public function findById(){
			$db = new DataConnection();
			$result=$db->executeQuery("Select * from producto where idProducto='".$this->id."'");
			if ( $dato = mysql_fetch_assoc($result) ){
				$productoFound = new Producto($dato["idProducto"],$dato["Nombre"],$dato["Precio"]);
				return $productoFound;
			}
			return false;	
		}
		
		
		
			
	}
}
?>
