<?php 
	include("../php/Validations.class.php");
	include("../php/Ingrediente.class.php");	
	$nombre    =	Validations::cleanString($_GET['nombre']);
	$area      =	Validations::cleanString($_GET['unidad']);

	if ( Validations::validaNombre($nombre)){
		if ( !isset($_GET["edit"]) ){
			$accept     =	Ingrediente::Agregar($nombre,$area);	
		}
		else
		{
			$accept     =	Ingrediente::Modificar($nombre,$area);	
		}
		if(!$accept)
		{
			echo "DATABASE_PROBLEM";
		}
		else
		{
			echo "OK";
		}		
	}else{
		echo "INPUT_PROBLEM";
	}
?>