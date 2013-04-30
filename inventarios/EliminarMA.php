<?php
	include("../php/Materia_Prima.class.php");
	$idm = $_GET["id"];
	$result = MateriaPrima::Eliminar($idm);
	if ( $result ){
		echo "OK";
	} else {
		echo "ERROR";
	}
?>