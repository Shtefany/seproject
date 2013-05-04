<?php
	include("clases/Produccion.class.php");
	$numprod = $_GET["numprod"];
	$result = Produccion::eliminar($numprod);
	if($result){
		echo "OK";
	}
	else{
		echo "ERROR";
	}
?>