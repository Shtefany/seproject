<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	$db = new DataConnection();
	$result = $db->executeQuery("SELECT MAX(Folio)+1 as 'Folio' FROM Venta");
	$name = "fol";
	$dato = mysql_fetch_assoc($result);
	//$sh.=$dato["Folio"];
	$h=strlen($dato["Folio"]);
	$ds="0";
	while($h<6)
	{
		$h++;
		$ds.="0";
	}
	$ds.=$dato["Folio"];
	echo "<input type='text' id='".$name."', value='".$ds."' disabled>";
	//echo $ds."</div>";
?>
