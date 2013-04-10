<?php 
	include("../php/Validations.class.php");
	include("../php/Empleado.class.php");	
	$nombre    =	Validations::cleanString($_GET['nombre']);
	$curp      =	Validations::cleanString($_GET['curp']);
	$password  = 	Validations::cleanString($_GET['pass']);
	$password2 = 	Validations::cleanString($_GET['pass2']);
	$direccion = 	Validations::cleanString($_GET['dir']);
	$area      =	Validations::cleanString($_GET['area']);		
	
	if ( Validations::validaNombre($nombre) && Validations::validaCURP($curp) ){
		if ( $password == $password2 ){
			$acept     =	Empleado::Agregar($curp,$nombre,$password,$area,$direccion);	
			if(!$acept){
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