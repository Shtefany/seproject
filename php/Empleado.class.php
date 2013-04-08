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
		public function Agregar($curp,$nombre,$password,$area,$direccion){
			$db = new DataConnection();
			$result = $db->executeQuery("SELECT id from Area WHERE nombre='".$this->tipo."'");
			$area = mysql_fetch_assoc($result);
			/*echo($area["id"]);*/
			
			if($result = $db->executeQuery("INSERT INTO Empleado (CURP,Nombre,Area,Contrasena,Direccion) VALUES('".$curp."','".$nombre."',".$area["id"].",'".$password."','".$direccion."') "))
			{
				return true;
			}
			return false;
			
		}
		public static function findById($id)
		{
			$db = new DataConnection();
			
			$result = $db->executeQuery("SELECT E.CURP,E.Nombre,A.nombre,E.Direccion FROM Empleado E,Area A  where CURP LIKE'".$id."%' AND E.Area = A.id");
			if ($dato = mysql_fetch_assoc($result)){
			
				$emp = new Empleado($dato["CURP"],$dato["Nombre"],$dato["Direccion"],$dato["Area"],$dato["Contrasena"]);
				return $emp;
			}	
			return false;
		}
		public static function BuscaEmpleado($id)
		{
			$db = new DataConnection();
			
			$result = $db->executeQuery("SELECT E.CURP,E.Nombre,A.nombre,E.Direccion FROM Empleado E,Area A  where CURP LIKE'".$id."%' AND E.Area = A.id");
		
			
			while($dato = mysql_fetch_assoc($result)){
				echo('<tr class="tr-cont">
				<td name ="id">'.$dato["CURP"].'</td>
				<td>'.$dato["Nombre"].'</td>
				<td>'.$dato["nombre"].'</td>
				<td>'.$dato["Direccion"].'</td>');	
				include("Option.php");
			
		}
		
		}
		
		public static function Eliminar($id){
			$db = new DataConnection();
			
			return $result = $db->executeQuery("DELETE FROM Empleado WHERE CURP='".$id."'");
		}
		
			
	}
}
?>
