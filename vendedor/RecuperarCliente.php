<?php
	include("../php/Cliente.class.php");
	$RFC = $_GET["id"];
	$result = Cliente::Recuperar($RFC);
	if ( $result ){
		echo "OK";
	} else {
		echo "ERROR";
	}
?>