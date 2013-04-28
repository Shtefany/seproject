<?php
	include("../php/DataConnection.class.php");
	$db = new DataConnection();
	$result = $db->executeQuery("SELECT folio FROM venta WHERE Fentrega like  curdate() and Estado not like '%Cancel%'");
	
	while( $dato = mysql_fetch_assoc($result) ){
		$db->executeQuery("Update venta set Estado='Entregado' WHERE  folio=".$dato["folio"]);
	}
?>
