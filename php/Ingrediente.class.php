<?php
if ( !defined("__INGREDIENTE__") ){
	define("__INGREDIENTE__","");
	include("../php/DataConnection.class.php");
	
	class Ingrediente{
		private $id;
		private $nombre;
		private $unidad;

		
		public function __construct($id,$nombre,$unidad)
		{
			$this->id = $id;
			$this->nombre = $nombre;
			$this->unidad = $unidad;
		}
		
		public function getId(){
			return $this->id;
		}	
		public function getNombre(){
			return $this->nombre;
		}
		public function getUnidad(){
			return $this->unidad;
		}

		
		public function setId($id){
			$this->id=$id;
		}	
		public function setNombre($nombre){
			$this->nombre=$nombre;
		}
		public function setPrecio($unidad){
			$this->unidad=$unidad;
		}
	
		
		public static function Agregar($nombre,$unidad){
			$db = new DataConnection();
			$qry = "INSERT INTO materiaprima (Nombre,Unidad) VALUES('".$nombre."','".$unidad."');";
			if($result = $db->executeQuery($qry))
			{
				return true;
			}
			return false;
		}
		
		public static function findByName($name){
			$db = new DataConnection();
			$result=$db->executeQuery("Select * from materiaprima where Nombre='".$name."'");
			if ( $dato = mysql_fetch_assoc($result) ){
				$mpfound = new Ingrediente($dato["idMateriaPrima"],$dato["Nombre"],$dato["Unidad"]);
				return $mpfound;
			}
			return false;	
		}
		
		public static function findById($id)
		{
			$db = new DataConnection();			
			$result = $db->executeQuery("SELECT * FROM materiaprima WHERE idMateriaPrima='".$id."'");
			if ($dato = mysql_fetch_assoc($result)){
				$mpfound = new Ingrediente($dato["idMateriaPrima"],$dato["Nombre"],$dato["Unidad"]);
				return $mpfound;
			}	
			return false;
		}
		public static function Modificar($id,$nombre,$unidad){
			$db = new DataConnection();
			$qry = "UPDATE materiaprima SET Nombre='".$nombre."', Unidad='".$precio."' WHERE idMateriaPrima='".$id."'";
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}
		
		public static function Eliminar($id){
			$db = new DataConnection();			
			return $result = $db->executeQuery("DELETE FROM materiaprima WHERE idMateriaPrima='".$id."'");
		}
		
		
			
	}
}
?>
