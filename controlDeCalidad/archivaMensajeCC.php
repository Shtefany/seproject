<?php 
	include("../php/Validations.class.php");
	include("../php/DataConnection.class.php");
	$id = Validations::cleanString($_GET["id"]);	
	$db = new DataConnection();
	if ( isset($_GET["reverse"]) ){
		$qry = "UPDATE mensajes SET archivadoCC=0 WHERE id=".$id;
	}else{
		$qry = "UPDATE mensajes SET archivadoCC=1 WHERE id=".$id;
	}
	$result = $db->executeQuery($qry);	
	if ( $result == true )
		echo "OK";
	else
		echo "ERROR";
?>