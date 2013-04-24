<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>
<table style="margin-left: 10px">
	<tr style='background-color:#333333; color: white;'>
		<td><h2>Fecha</h2></td>
		<td><h2>Remitente</h2></td>
		<td><h2>Asunto</h2></td>
	</tr>
<?php	
	include("../php/DataConnection.class.php");	
	include("../php/AccessControl.php");	
	$flt = $_GET["archivado"];
	$db = new DataConnection();
	$qry = "SELECT * FROM Mensajes,Empleado WHERE Mensajes.archivado = ".$flt." and Mensajes.remitente=Empleado.CURP and Mensajes.destinatario='".$sesion->getEmpleado()->getArea()."' ORDER BY id DESC";
	$result = $db->executeQuery($qry);
	$cont = 0;
	while($fila = mysql_fetch_array($result))
	{		
		$cont++;
		echo "<tr style='background-color:#DDDDDD;'>";
		echo "<td>".$fila["fecha"]."</td>";
		echo "<td>".$fila["Nombre"]."</td>";
		echo "<td>".$fila["asunto"]."</td>";
		echo "<td class='opc'><img src='../img/busc.png' onclick='viewDetails(".$fila["id"].");' alt='Modificar'class='clickable'/></td>";
		echo "</tr>";
	}
	if ( $cont == 0 ){
		echo "<tr style='background-color:#DDDDDD;'>";
		echo "<td colspan='4'>No hay mensajes</td>";
		echo "</tr>";
	}
?>

</table>

