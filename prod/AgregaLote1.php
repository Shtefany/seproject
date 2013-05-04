<?php 
	include("../php/Validations.class.php");
	include("clases/Lote.class.php");	

	$nolote      =	Validations::cleanString($_GET['nolote']);	
	$producto    =	Validations::cleanString($_GET['producto']);
	$cantidad    = 	Validations::cleanString($_GET['cantidad']);
	$elaboracion = 	Validations::cleanString($_GET['elaboracion']);
	$caducidad   = 	Validations::cleanString($_GET['caducidad']);
	/*
	echo $nolote."<br />";	
	echo $producto."<br />";
	echo $linea."<br />";
	echo $elaboracion."<br />";			
	echo $caducidad."<br />";		

	$qry = "UPDATE lote SET productoAsociado='".$producto."', lineaProduccion = '".$linea."'
				fechaElaboracion = '".$elaboracion."', fechaCaducidad = '".$caducidad."' 
				WHERE nolote = '".$nolote."'";			
	echo "Consulta<br/> " . $qry . "<br />";
	*/

	//Si no se encuentra el campo edit se agrega, si no se modifica
	if ( !isset($_GET["edit"]) ){
		$accept     =	Lote::agregar($producto, $cantidad, $elaboracion, $caducidad);	
	}else{
		$accept     =	Lote::modificar($nolote, $producto, $cantidad, $elaboracion, $caducidad);
		//echo "Accept: ".$accept;
	}
	if(!$accept){	
		echo "DATABASE_PROBLEM";
	}else{
		echo "OK";
	}

?>