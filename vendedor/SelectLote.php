<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	$db = new DataConnection();
	$result = $db->executeQuery("SELECT numlote FROM lote where Estado is NULL and idProducto=".$_GET['id']." order by Fecha_Cad");
	$totalFilas    =    mysql_num_rows($result);
	if($totalFilas>0){
	while( $dato = mysql_fetch_assoc($result) ){
	echo "<option value='".$dato["numlote"]."'>".$dato["numlote"]."</option>";}}
	else{echo "<option value=0>Sin Existencia</option>";}
	//echo "</select>";
?>

