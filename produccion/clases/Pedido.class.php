<?php

	class Pedido{
		
		private $estado;
		private $numPedido;
		
		public function __construct(){
			$this->estado = '';
			$this->numPedido = '0';
		}
		
		public function consultarEstado($numero){
			$this->numPedido = $numero;
		}
		
	}

?>