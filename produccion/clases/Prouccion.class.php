<?php

	class Produccion{
		
		// ¿?¿?¿?LOTE
		private $fechaElaboracion;
		private $lineaProduccion;
		private $productoAsociado;
		// ¿?¿?¿?LOTE
		private $unidadesProducto;
		private $encargadoAsociado;
		
		
		public function __construct(){
			$this->fechaElaboracion = '';
			$this->lineaProduccion = '0';
			$this->productoAsociado = '';
			$this->unidadesProducto = '0';
			$this->encargadoAsociado = '';
		}
		
		public function registrarProduccion($lote, $unidades, $encargado){
			$this->unidadesProducto = $unidades;
			$this->encargadoAsociado = $encargado;
		}
		
	}

?>