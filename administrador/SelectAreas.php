<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	$db = new DataConnection();
	$result = $db->executeQuery("SELECT * FROM Area");
	$name = "area";
	if ( isset($_GET["name"]) ){
		$name = Validations::cleanString($_GET["name"]);
	}
	echo "<select id='".$name."' name='".$name."'>";
	while( $dato = mysql_fetch_assoc($result) ){
		echo "<option value='".$dato["id"]."'>".$dato["nombre"]."</option>";
	}
	echo "</select>";
?>