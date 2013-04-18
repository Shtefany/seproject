<?php
	$lineas = array('1' => 'Linea 1', 2 => 'Linea 2', 3 => 'Linea 3');
	$encargados = array('Rodrigo Gomez' => '1', 'Miguel Rueda' => '1', 'Javier Hernandez' => '2', 
	'Edgar Sanchez' => '3');		
	/*
	function obtenerLineas(){
		global $lineas;
		foreach($lineas as $index => $linea){
			echo '<option value="' . $index . '">' . $linea . '</option>';
		}
	}
	*/
	
	if(isset($_REQUEST['idlinea']) && $_REQUEST['idlinea'] != 'Any'){
		obtenerEncargados($_REQUEST['idlinea']);
	}
	
	function obtenerEncargados($idlinea = ''){
		global $encargados;
		foreach($encargados as $encargado => $indice){
			if($indice == $idlinea){
				echo '<option value="' . $indice .'">' . $encargado . '</option>';
			}
		}
	}
	
?>