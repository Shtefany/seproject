<?php 
	/*
		cliente
	*/
	include("../php/Validations.class.php");
	include("../php/Cliente.class.php");	
	$nombre    =	Validations::cleanString($_GET['nombre']);
	$RFC      =	Validations::cleanString($_GET['RFC']);
	$telefono  = 	Validations::cleanString($_GET['telefono']);
	$email = 	Validations::cleanString($_GET['email']);
	$direccion = 	Validations::cleanString($_GET['direccion']);
	/* Decodifica los caracteres de la URL */
	$direccion = str_replace("%23", "#", $direccion);
	
	if ( Validations::validaNombre($nombre)&&Validations::validaRFC($RFC)&&Validations::validaEmail($email)&&Validations::validaTel($telefono)){
					
			if ( !isset($_GET["edit"]) ){
				$accept     =	Cliente::Agregar($RFC,$nombre,$telefono,$email,$direccion);	
			}else{
					$accept     =	Cliente::Modificar($RFC,$nombre,$telefono,$email,$direccion);	
			}
			if(!$accept){
				echo "DATABASE_PROBLEM";
			}else{
				echo "OK";
			}
	}else{
		echo "INPUT_PROBLEM";
	}

?>