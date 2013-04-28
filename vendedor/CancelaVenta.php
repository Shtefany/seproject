<?php
	include("../php/Venta.class.php");
	$Folio = $_GET["id"];
	$result = Venta::Eliminar($Folio);
	if ( $result ){
		echo "OK";
	} else {
		echo "ERROR";
	}
?>