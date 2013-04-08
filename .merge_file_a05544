<?php
if ( !defined("__PRODUCTO__") ){
	define("__PRODUCTO__","");
	include("DataConnection.class.php");
	
	class Producto{
		private $id;
		private $nombre;
		private $precio;
		private $receta;

		
		public function __construct($id,$nombre,$precio,$receta)
		{
			$this->id = $id;
			$this->nombre = $nombre;
			$this->precio = $precio;
			$this->receta = $receta;
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
		public function getReceta(){
			return $this->nombre;
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
		public function setReceta($receta){
			$this->receta=receta;
		}
		
		public function Agregar(){
			$db = new DataConnection();
			$db->executeQuery("Insert into producto (Nombre,Precio,Receta) values('".$this->$nombre."',".$this_>$precio.",".$this->$receta.") ");
		}
		
		public function findById(){
			$db = new DataConnection();
			$result=$db->executeQuery("Select * from producto where idProducto='".$this->$id."'");
			if ( $dato = mysql_fetch_assoc($result) ){
				$productoFound = new Producto($dato["idProducto"],$dato["Nombre"],$dato["Precio"],$dato["Receta"]);
				return $productoFound;
			}
			return false;	
		}
		
		public function Eliminar(){
			$db = new DataConnection();
			$db->executeUpdate("Delete  from producto where idProducto='".$this->$id."'");
		}
		
			
	}
}
?>
