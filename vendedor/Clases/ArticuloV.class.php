<?php
if ( !defined("__ARTICULOV__") ){
	define("__ARTICULOV__","");
	include("DataConnection.class.php");
	
	class ARTICULOV{
		private $IDVENTA;
		private $Cantidad;
		private $Telefono;
		private $Estatus;
		private $Direccion;
		
		public function __construct($RFC,$nombre,$Telefono,$Email,$Direccion)
		{
			$this->RFC = $RFC;
			$this->nombre = $nombre;
			$this->Telefono = $Telfono;
			$this->Email = $Email;
			$this->Direccion= $Direccion;		
		}
		
		public function getRFC(){
			return $this->RFC;
		}
		public function getNombre(){
			return $this->nombre;
		}
			public function getTelefono(){
			return $this->Telefono;
		}
		public function getEmail(){
			return $this->Email;
		}
		public function getDireccion(){
			return $this->Direccion;
		}
			public static function Agregar($RFC,$nombre,$Telefono,$Email,$Direccion){
			$db = new DataConnection();
			$qry = "INSERT INTO Cliente (RFC,Nombre,Telefono,Email,Direccion) VALUES('".$curp."','".$nombre."',".$Telefono.",'".$Email."','".$Direccion."');";
			if($result = $db->executeQuery($qry))
			{
				return true;
			}
			return false;
		}
		
		public static function Modificar($nombre,$Telefono,$Email,$Direccion){
		    $db = new DataConnection();
			$qry = "UPDATE Cliente SET Nombre='".$nombre."', Telefono=".$Telefono.", Email=".$Email.",Direccion='".$Direccion."' WHERE RFC='".$RFC."'";
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}
		
		public static function findById($id)
		{
			$db = new DataConnection();			
			$result = $db->executeQuery("SELECT * FROM Cliente WHERE RFC='".$id."'");
			if ($dato = mysql_fetch_assoc($result)){
				$clie = new Cliente($dato["RFC"],$dato["Nombre"],$dato["Telefono"],$dato["Email"],$dato["Direccion"]);
				return $emp;
			}	
			return false;
		}
				
		public static function Eliminar($id){
			$db = new DataConnection();			
			return $result = $db->executeQuery("DELETE FROM Cliente WHERE RFC='".$id."'");
		}	
	}
}
?>
