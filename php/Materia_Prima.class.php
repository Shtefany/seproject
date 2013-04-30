<?php
if ( !defined("__MATERIA__") ){
	define("__MATERIA__","");
	include("DataConnection.class.php");
	
	class MateriaPrima{

		
		private $idMateria;
		private $nombre;
		private $proveedor;
		private $precio;
		private $cantidad;
		private $Fecha_Ca;
		private $Fecha_Ll;
		private $unidad;
		

		public function __construct($idm,$n,$p,$pr,$c,$unit,$Fecha_c,$Fecha_l)
		{
			
			$this->idMateria = $idm;
			$this->nombre = $n;
			$this->proveedor = $p;
			$this->precio = $pr;
			$this->cantidad = $c;
			$this->unidad = $unit;
			$this->Fecha_Ca = $Fecha_c;
			$this->Fecha_Ll = $Fecha_l;
				
		}
		
		public function getNombre(){
			return $this->nombre;
		}
		public function getIdm(){
			return $this->idMateria;
		}
		public function getProveedor(){
			return $this->proveedor;
		}
		public function getUniad(){
			return $this->unidad;
		}
		public function getPrecio(){
			return $this->precio;
		}
		public function getCantidad(){
			return $this->cantidad;
		}
		public function getFechaC(){
			return $this->Fecha_Ca;
		}
		public function getFechaL(){
			return $this->Fecha_Ll;
		}



		public static function Agregar($nombre,$proveedor,$cantidad,$unidad,$precio,$fecha_c,$fecha_l)
		{
			//echo $fecha_c.$fecha_l;
			$connection = new DataConnection();

			$registro1 = $connection->executeQuery("SELECT * from proveedor where Nombre = '".$proveedor."'");


			while($reg1 = mysql_fetch_array($registro1))
			{
				
				$idProveedor = $reg1['RFC'];
				
			}

			//Crea la consulta a realizar

			$connection->executeQuery("INSERT into materia_prima(Nombre, Unidad, Fecha_Llegada, Fecha_Caducidad) VALUES('".$nombre."', '".$unidad."', '".$fecha_l."', '".$fecha_c."')");

			//echo "INSERT into materia_prima(Nombre, Unidad, Fecha_Llegada, Fecha_Caducidad) VALUES('".$nombre."', '".$unidad."', '".$fecha_l."', '".$fecha_c."')";
			$registro2 = $connection->executeQuery("SELECT m.idMateria from materia_prima m where m.Nombre = '".$nombre."'");

			while($reg2 = mysql_fetch_array($registro2))
			{
				
				$idMateria = $reg2['idMateria'];
				
			}

			//echo "SELECT m.idMateria from materia_prima m where m.Nombre = '".$nombre."'";

			//echo ("INSERT into materia_proveedor(Precio_lote, idMateria, Proveedor_RFC, cantidad) VALUES('".$precio."', '".$idMateria."', '".$idProveedor."', '".$cantidad."')");


			if($result = $connection->executeQuery("INSERT into materia_proveedor(Precio_lote, idMateria, Proveedor_RFC, cantidad) VALUES('".$precio."', ".$idMateria.", '".$idProveedor."', '".$cantidad."')"))
			{
				return true;
			}
			return false;
		}
		
		public static function Modificar($nombre,$proveedor,$cantidad,$unidad,$precio,$fecha_c,$idm){
			$db = new DataConnection();

			$db->executeQuery("UPDATE materia_proveedor SET  cantidad='".$cantidad."', precio_lote='".$precio."' WHERE idMateria=".$idm);

			$qry = "UPDATE materia_prima SET Nombre='".$nombre."', Unidad='".$unidad."' ,Fecha_Caducidad='".$fecha_c."' WHERE idMateria=". $idm;
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}
		 
		public static function findById($id)
		{
			$db = new DataConnection();			
			$result = $db->executeQuery("SELECT mp.idMateria, mp.nombre, 
			p.nombre as proveedor, mpr.precio_lote, mpr.cantidad,
			mp.unidad, mp.fecha_caducidad, mp.fecha_llegada
			from materia_prima mp, proveedor p, 
			materia_proveedor mpr where mp.idMateria = mpr.idMateria and 
			p.RFC = mpr.proveedor_RFC and mp.idMateria = ".$id);


			if ($dato = mysql_fetch_assoc($result)){
				//echo $dato["idMateria"].$dato["nombre"].$dato["proveedor"].$dato["precio_lote"].$dato["cantidad"].$dato["unidad"].$dato["fecha_caducidad"];
				$emp = new MateriaPrima($dato["idMateria"],$dato["nombre"],$dato["proveedor"],$dato["precio_lote"],$dato["cantidad"],$dato["unidad"],$dato["fecha_caducidad"],$dato["fecha_llegada"]);
				return $emp;
			}	
			return false;
		}
				
		public static function Eliminar($id){
			$db = new DataConnection();	
			$db->executeQuery("DELETE FROM materia_proveedor WHERE idMateria ='".$id."'");		
			return $result = $db->executeQuery("DELETE FROM Materia_Prima WHERE idMateria='".$id."'");
		}	
	}
}
?>