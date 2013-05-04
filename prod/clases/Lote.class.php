<?php
	if(!defined("__LOTE__")){
		define("__Lote__", "");
		include("../php/DataConnection.class.php");
		
		class Lote{
			
			private $nolote;
			private $productoAsociado;
			private $fechaElaboracion;
			private $fechaCaducidad;
			private $linea;
			private $cantidad;
			
			public function __construct($nolote, $productoAsociado, $cantidad, $fechaElaboracion,
			 $fechaCaducidad){
				$this->nolote = $nolote;
				$this->productoAsociado = $productoAsociado;
				$this->fechaElaboracion = $fechaElaboracion;
				$this->fechaCaducidad = $fechaCaducidad;
				$this->cantidad = $cantidad;
			}//construct
			
			public function getProducto(){
				return $this->productoAsociado;
			}
			
			public function getElaboracion(){
				return $this->fechaElaboracion;
			}
			
			public function getCaducidad(){
				return $this->fechaCaducidad;
			}
			
			public function getLinea(){
				return $this->linea;
			}
			
			public function getCantidad(){
				return $this->cantidad;
			}			
			
			public static function agregar($producto, $cantidad, $elaboracion, $caducidad){
				$db = new DataConnection();
				$qry = "INSERT INTO Lote(noLote, productoAsociado, cantidadProducto, fechaElaboracion,
				fechaCaducidad) VALUES ('0', 
				'".$producto."', '".$cantidad."', '".$elaboracion."', '".$caducidad."');";
				if($result = $db->executeQuery($qry)){
					return true;
				}
				return false;
			}//Agregar
			
			public static function modificar($nolote, $producto, $cantidad, $elaboracion, 
			$caducidad){
				$db = new DataConnection();
				$qry = "UPDATE lote SET productoAsociado='".$producto."', cantidadProducto = '".$cantidad."', 
				fechaElaboracion = '".$elaboracion."', fechaCaducidad = '".$caducidad."'
				WHERE nolote = '".$nolote."';";			
				if($result = $db->executeQuery($qry)){
					return true;
				}
				return false;
			}
			
			public static function findById($nolote){
				$db = new DataConnection();
				$result = $db->executeQuery("SELECT * FROM lote WHERE noLote='".$nolote."'");
				if($dato = mysql_fetch_assoc($result)){
					$lote = new Lote($dato["noLote"], $dato["productoAsociado"], $dato["cantidadProducto"],
					$dato["fechaElaboracion"], $dato["fechaCaducidad"]);
					return $lote;
				}
				return false;
			}
			
			public static function eliminar($nolote){
				$db = new DataConnection();
				return $result = $db->executeQuery("DELETE FROM lote WHERE nolote='".$nolote."'");
			}
				
		}//class lote
	}//if defined
?>