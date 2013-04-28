<?php 
	/*
		cliente
	*/
	include("../php/Validations.class.php");
	include("../php/ArticuloV.class.php");	
	$Folio    =	Validations::cleanString($_GET['Folio']);
	$Lote      =	Validations::cleanString($_GET['Lote']);
	$Producto  = 	Validations::cleanString($_GET['Producto']);
	
	//if ( Validations::validaNombre($nombre)&&Validations::validaRFC($RFC)&&Validations::validaEmail($email)&&Validations::validaTel($telefono)){
					
			//if ( !isset($_GET["edit"]) ){
			//	$accept     =	Cliente::Agregar($RFC,$nombre,$telefono,$email,$direccion);	
			//}else{
				$accept     =	ArticuloV::Agregar($Folio,$Producto,$Lote);	
			//}
			if(!$accept){
				echo "DATABASE_PROBLEM";
			}else{
				echo "OK";
			}
	/*}else{
		echo "INPUT_PROBLEM";
	}*/
?>