<?php

	class Ingrediente{
		
		private $identificador;
		private $nombre;
		private $cantidadDisponible;
		
		public function __construct(){
			$this->identificador = '0';
			$this->nombre = '';
			$this->cantidadDisponible = '0';
		}
		
		public function consultarDisponibilidad($id){
			$this->identificador = $id;
		}
		
	}
?>