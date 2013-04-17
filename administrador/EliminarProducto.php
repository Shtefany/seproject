<?php
	include("../php/Producto.class.php");
	$id = $_GET["id"];
	$result = Producto::Eliminar($id);
	if ( $result ){
		echo "OK";
	} else {
		echo "ERROR";
	}
?>