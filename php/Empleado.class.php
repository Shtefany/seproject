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
			
	}
}
?>
