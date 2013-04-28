<?php
if ( !defined("__VENTA__") ){
	define("__VENTA__","");
	include("DataConnection.class.php");
	
	class Venta{
		private $Folio;
		private $Fecha;
		private $Cliente;
		private $Fentrega;
		
		//public function __construct($folio,$fecha,$cliente,$producto,$cantidad,$existencia,$fentrega)
		public function __construct($folio,$fecha,$cliente,$fentrega)
		{
			$this->Folio = $folio;
			$this->Fecha = $fecha;
			$this->Cliente = $cliente;
			//$this->Producto = $producto;
			//$this->Cantidad = $cantidad;
			//$this->Existencia = $existencia;
			$this->Fentrega = $fentrega;
					
		}
		
		public function getFolio(){
			return $this->Folio;
		}
		public function getFecha(){
			return $this->Fecha;
		}
		public function getCliente(){
			return $this->Cliente;
		}
		public function getCantidad(){
			return $this->Cantidad;
		}
		public function getExistencia(){
			return $this->Existencia;
		}
		public function getFentrega(){
			return $this->Fentrega;
		}
			public static function Agregar($Cliente){
			$db = new DataConnection();
			$aux= $db->executeQuery("Select MAX(Fentrega) as 'Fentrega' from venta");
			$aux1= $db->executeQuery("SELECT DATEDIFF(CURDATE( ),MAX( Fentrega )) as 'Fecha' FROM venta");
			$dato = mysql_fetch_assoc($aux1);
			$row=mysql_fetch_row($aux);
			if($aux!=0 and $dato["Fecha"]<0 )
			{
				$qry = "INSERT INTO Venta (Fecha,RFC,Fentrega,Estado) VALUES((SELECT CURDATE( )),'".$Cliente."',(SELECT DATE_ADD(MAX(v.Fentrega),INTERVAL 2 Day) FROM venta v ),'En Espera')";
			}
			else
			{
				$qry = "INSERT INTO Venta (Fecha,RFC,Fentrega,Estado) VALUES((SELECT CURDATE( )),'".$Cliente."',(SELECT DATE_ADD(curdate(),INTERVAL 2 Day)),'En Espera')";
			}
			
			//INSERT INTO Venta (Fecha,RFC,Fentrega) VALUES((SELECT CURDATE( )),"AECJ880326XXX",(SELECT DATE_ADD(MAX(Fentrega),INTERVAL 5 Day) FROM Venta)) 
			if($result = $db->executeQuery($qry))
			{
				return true;
			}
			return false;
		}
		
		public static function Modificar($Fentrega){
		    $db = new DataConnection();
			$qry = "UPDATE Venta SET Fentrega='".$Fentrega."'";
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}
		
		public static function findById($Folio)
		{
			$db = new DataConnection();			
			$result = $db->executeQuery("SELECT * FROM Venta WHERE Folio='".$Folio."'");
			if ($dato = mysql_fetch_assoc($result)){
				$Vent= new Venta($dato["Folio"],$dato["Fecha"],$dato["RFC"],$dato["Fentrega"]);
				return $Vent;
			}	
			return false;
		}
				
		public static function Eliminar($Folio){
			$db = new DataConnection();			
			$result = $db->executeQuery("Update Venta set Estado='Cancelada' where Folio=".$Folio);
			$datos= $db->executeQuery("Update ArticuloVenta set Estado='Cancelado' where Folio=".$Folio);
			return $result;
		}	
	}
}
?>