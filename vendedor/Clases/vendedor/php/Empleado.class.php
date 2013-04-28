<?php
if ( !defined("__EMPLEADO__") ){
	define("__EMPLEADO__","");
	include("DataConnection.class.php");
	
	class Empleado{
		private $CURP;
		private $nombre;
		private $direccion;
		private $tipo;
		private $contrasena;
		
		public function __construct($curp,$nombre,$direccion,$tipo,$contrasena)
		{
			$this->CURP = $curp;
			$this->nombre = $nombre;
			$this->direccion = $direccion;
			$this->tipo = $tipo;
			$this->contrasena = $contrasena;		
		}
		
		public static function iniciarSesion($curp,$contrasena){
			$db = new DataConnection();
			$result = $db->executeQuery("SELECT * FROM Empleado WHERE CURP='".$curp."' and Contrasena='".$contrasena."'");			
			if ( $dato = mysql_fetch_assoc($result) ){
				$empleado = new Empleado($dato["CURP"],$dato["Nombre"],$dato["Direccion"],$dato["Area"],$dato["Contrasena"]);
				return $empleado;
			}
			return false;		
		}
		
		public function getPath(){
			$db = new DataConnection();
			$result = $db->executeQuery("SELECT * FROM Area WHERE id=".$this->tipo."");	
			if ( $dato = mysql_fetch_assoc($result) ){
				return $dato["path"];
			}
			return false;		
		}
		
		public function getNombre(){
			return $this->nombre;
		}
		public function getCurp(){
			return $this->CURP;
		}
		public function getDireccion(){
			return $this->direccion;
		}
		public function getContrasena(){
			return $this->contrasena;
		}
		public function getArea(){
			return $this->tipo;
		}
		public static function Agregar($curp,$nombre,$password,$area,$direccion){
			$db = new DataConnection();
			$qry = "INSERT INTO Empleado (CURP,Nombre,Area,Contrasena,Direccion) VALUES('".$curp."','".$nombre."',".$area.",'".$password."','".$direccion."');";
			if($result = $db->executeQuery($qry))
			{
				return true;
			}
			return false;
		}
		
		public static function Modificar($curp,$nombre,$area,$direccion){
			$db = new DataConnection();
			$qry = "UPDATE Empleado SET Nombre='".$nombre."', Area=".$area." ,Direccion='".$direccion."' WHERE CURP='".$curp."'";
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}
		
		public static function findById($id)
		{
			$db = new DataConnection();			
			$result = $db->executeQuery("SELECT * FROM Empleado WHERE CURP='".$id."'");
			if ($dato = mysql_fetch_assoc($result)){
				$emp = new Empleado($dato["CURP"],$dato["Nombre"],$dato["Direccion"],$dato["Area"],$dato["Contrasena"]);
				return $emp;
			}	
			return false;
		}
				
		public static function Eliminar($id){
			$db = new DataConnection();			
			return $result = $db->executeQuery("DELETE FROM Empleado WHERE CURP='".$id."'");
		}	
	}
}
?>
