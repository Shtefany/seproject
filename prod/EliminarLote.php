<?php
	include("clases/Lote.class.php");
	$nolote = $_GET["nolote"];
	$result = Lote::eliminar($nolote);
	if($result){
		echo "OK";
	}
	else{
		echo "ERROR";
	}
?>