<?php

	class Lote{
		
		private $numLote;
		private $productoAsociado;
		private $fechaElaboracion;
		private $lineaProduccion;
		
		public function __construct(){
			$this->numLote = '0';
			$this->productoAsociado = '';
			$this->fechaElaboracion = '';
			$this->lineaProduccion = '0';
		}
		
		public function registrarLote($num, $prod, $fecha, $linea){
			$this->numLote = $num;
			$this->productoAsociado = $prod;
			$this->fechaElaboracion = $fecha;
			$this->lineaProduccion = $linea;
		}
		
		public function consultarLote($num){
		}
		
	}

?>