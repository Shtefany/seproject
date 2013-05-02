<?php 

	include("../php/Validations.class.php");
	include("../php/Materia_Prima.class.php");	
	$nombre    =	Validations::cleanString($_GET['nombre']);
	$proveedor =	Validations::cleanString($_GET['proveedor']);
	$cantidad  = 	Validations::cleanString($_GET['cantidad']);
	$unidad    = 	Validations::cleanString($_GET['unidad']);
	$precio    = 	Validations::cleanString($_GET['precio']);
	$fecha_l   =	Validations::cleanString($_GET['fecha_l']);
	$fecha_c   =	Validations::cleanString($_GET['fecha_c']);
	$idm       =	Validations::cleanString($_GET['idm']);

	/* Decodifica los caracteres de la URL */
	$direccion = str_replace("%23", "#", $direccion);
	
	if ( !isset($_GET["edit"]) ){
		$accept     =	MateriaPrima::Agregar($nombre,$proveedor,$cantidad,$unidad,$precio,$fecha_c,$fecha_l);	
	}else{
		$accept     =	MateriaPrima::Modificar($nombre,$proveedor,$cantidad,$unidad,$precio,$fecha_c,$idm);	
	}

	
	if(!$accept){
		echo "DATABASE_PROBLEM";
	}else{
		echo "OK";
	}


?>