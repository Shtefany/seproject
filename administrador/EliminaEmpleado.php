<?php
	include("../php/Empleado.class.php");
	$curp = $_GET["id"];
	$result = Empleado::Eliminar($curp);
	if ( $result ){
		echo "OK";
	} else {
		echo "ERROR";
	}
?>