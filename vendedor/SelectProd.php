<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	$db = new DataConnection();
	$result = $db->executeQuery("SELECT idProducto,Nombre FROM producto");
	$name = "producto";
	if ( isset($_GET["name"]) ){
		$name = Validations::cleanString($_GET["name"]);
	}
	echo "<select id='prod' name='".$name."'>";
	while( $dato = mysql_fetch_assoc($result) ){
		echo "<option value='".$dato["idProducto"]."'>".$dato["Nombre"]."</option>";
	}
	echo "</select>";
?>

