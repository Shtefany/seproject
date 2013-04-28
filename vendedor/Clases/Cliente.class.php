<?php
if ( !defined("__CLIENTE__") ){
	define("__CLIENTE__","");
	include("DataConnection.class.php");
	
	class Cliente{
		private $RFC;
		private $Nombre;
		private $Telefono;
		private $Email;
		private $Direccion;
		
		public function __construct($RFC,$nombre,$telefono,$email,$direccion)
		{
			$this->RFC = $RFC;
			$this->Nombre = $nombre;
			$this->Telefono = $telfono;
			$this->Email = $email;
			$this->Direccion= $direccion;		
		}
		
		public function getRFC(){
			return $this->RFC;
		}
		public function getNombre(){
			return $this->Nombre;
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
		public static function Agregar($RFC,$nombre,$telefono,$email,$direccion){
			$db = new DataConnection();
			$qry = "INSERT INTO Cliente (RFC,Nombre,Telefono,Email,Direccion) VALUES('".$RFC."','".$nombre."','".$telefono."','".$email."','".$direccion."');";
			if($result = $db->executeQuery($qry))
			{
				return true;
			}
			return false;
		}
		
		public static function Modificar($RFC,$nombre,$telefono,$email,$direccion){
			$db = new DataConnection();
			$qry = "UPDATE Cliente SET Nombre='".$nombre."', Telefono='".$telefono."' , Email='".$email."', Direccion='".$direccion."' WHERE RFC='".$RFC."'";
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}
		
		public static function findById($id)
		{
			$db = new DataConnection();			
			$result = $db->executeQuery("SELECT * FROM Cliente WHERE RFC='".$id."'");
			if ($dato = mysql_fetch_assoc($result)){
				$emp = new Empleado($dato["RFC"],$dato["Nombre"],$dato["Telefono"],$dato["Email"],$dato["Direccion"]);
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
