<?php
if ( !defined("__ARTICULOV__") ){
	define("__ARTICULOV__","");
	include("../php/DataConnection.class.php");	
	//include("Produccion.class.php");	

	class ARTICULOV{
		private $IdVenta;	//folio
		private $IdLote;
		private $Estado;

		public function __construct($IdVenta, $IdLote, $Estado){
			$this->IdVenta = $IdVenta;
			$this->IdLote = $IdLote;
			$this->Estado = $Estado;
		}

		public function getLote(){
			return $this->IdLote;
		}
		public function getEstado(){
			return $this->Estado;
		}
		
		public static function findById($folio){
			$db = new DataConnection();			
			$result = $db->executeQuery("SELECT * FROM articuloventa WHERE folio='".$folio."'");
			
			if ($dato = mysql_fetch_assoc($result)){
				$aVenta = new ArticuloV($dato["folio"], $dato["idLote"], $dato["Estado"]);
				return $aVenta;
			}	
			return false;
		}	
	
		//modificar($folio, $linea, $encargado, $producto, $cantidad, $elaboracion, $caducidad, $estado);		
		public static function modificar($folio, $linea, $encargado, $producto, $cantidad, $elaboracion, $caducidad, $estado){
			//Se agrega la produccion si es valida, se modifica el estado del articulo pendiente
			$db = new DataConnection();
			
			$resultado = Produccion::agregar($linea, $encargado, $producto, $cantidad, $elaboracion, $caducidad);
			if($resultado){
				$qry = "UPDATE articuloventa SET Estado = '$estado' WHERE folio = '$folio';";
				if($res = $db->executeQuery($qry)){
					return true;
				}
			}

			return false;
		}	
	}//Clase
}
?>