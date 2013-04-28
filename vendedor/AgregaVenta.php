<?php 
	/*
		cliente
	*/
	include("../php/Validations.class.php");
	include("../php/venta.class.php");	
	$Cliente   =	Validations::cleanString($_GET['Cliente']);
	$accept     =	venta::Agregar($Cliente);	
	if(!$accept){
				echo "DATABASE_PROBLEM";
	}else{
				echo "OK";
	}
?>