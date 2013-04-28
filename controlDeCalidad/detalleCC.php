<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>
<table style="width: 500px; margin-left:10px;">
<?php	
	include("../php/DataConnection.class.php");	
	include("../php/AccessControl.php");	
	$db = new DataConnection();
	
	$extra = "";
	if ( isset($_GET["area"] ) ){
		$extra = " AND Mensajes.area=".$_GET["area"];
	}
	
	$qry = "SELECT * FROM Mensajes,Empleado WHERE Mensajes.remitente=Empleado.CURP AND Mensajes.id=".$_GET["id"].$extra;
	$result = $db->executeQuery($qry);
	if($fila = mysql_fetch_array($result))
	{	
		echo "<tr>";
		echo "<td colspan ='2'><h1>".$fila["asunto"]."</h1></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td style='width: 100px;'>Recibido:</td><td>".$fila["fecha"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>Remitente:</td><td>".$fila["Nombre"]."</td>";
		echo "</tr>";
		if ( $fila["problema"] == 1 ){
			echo "<tr>";
			echo "<td colspan ='2' style='width: 500px;'><b>Enviado a control de calidad</b></td>";
			echo "</tr>";
		}
		echo "<tr>";
		echo "<td colspan ='2' style='width: 500px;'><hr /></td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td colspan ='2'>".$fila["mensaje"]."</td>";
		echo "</tr>";
		echo "<input type='hidden' id='id' value='".$fila["id"]."' />";
		echo "<input type='hidden' id='archivadoCC' value='".$fila["archivadoCC"]."' />";
	}
?>
</table>

