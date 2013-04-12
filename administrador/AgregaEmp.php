<?php 
	/*
		AgregaEmp.php
		
		Agrega o modifica un empleado en la base de datos
		
		Recibe:
			$_GET["nombre"]: Nombre del empleado
			$_GET["curp"]  : CURP del empleado
			$_GET["pass"]  : Contraseña del empleado
			$_GET["pass2"] : Confirmación de la contraseña del empleado
			$_GET["dir"]   : Dirección del empleado
			$_GET["area"]  : Id del area del empleado
			$_GET["edit"]  : 1 cuando ya existe el empleado (modificar),
							 sin definir cuando se agrega el empleado
		
		Regresa:
			OK	: La transacción se realizo correctamente
			DATABASE_PROBLEM: No se pudo realizar la acción en la bd
			MISSMATCH_PASSWORD: Los passwords no coinciden
			INPUT_PROBLEM: Algun elemento no tiene el formato correcto
	*/
	include("../php/Validations.class.php");
	include("../php/Empleado.class.php");	
	$nombre    =	Validations::cleanString($_GET['nombre']);
	$curp      =	Validations::cleanString($_GET['curp']);
	$password  = 	Validations::cleanString($_GET['pass']);
	$password2 = 	Validations::cleanString($_GET['pass2']);
	$direccion = 	Validations::cleanString($_GET['dir']);
	$area      =	Validations::cleanString($_GET['area']);

	/* Decodifica los caracteres de la URL */
	$direccion = str_replace("%23", "#", $direccion);
	
	if ( Validations::validaNombre($nombre) && Validations::validaCURP($curp) ){
		if ( $password == $password2 ){			
			if ( !isset($_GET["edit"]) ){
				$accept     =	Empleado::Agregar($curp,$nombre,$password,$area,$direccion);	
			}else{
				$accept     =	Empleado::Modificar($curp,$nombre,$area,$direccion);	
			}
			if(!$accept){
				echo "DATABASE_PROBLEM";
			}else{
				echo "OK";
			}
		}else{
			echo "MISSMATCH_PASSWORD";
		}
	}else{
		echo "INPUT_PROBLEM";
	}

?>