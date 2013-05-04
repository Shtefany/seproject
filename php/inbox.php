<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>
<table id="table-content">
	<tr class="tr-header">
		<td><h2>Fecha</h2></td>
		<td><h2>Remitente</h2></td>
		<td><h2>Mensaje</h2></td>
	</tr>
<?php	
	include("../php/DataConnection.class.php");	
	include("../php/AccessControl.php");	
	$db = new DataConnection();
	$qry = "SELECT * FROM Inbox,Mensajes,Empleado WHERE Mensajes.remitente=Empleado.CURP and Inbox.msg=Mensajes.id and Inbox.destinatario='".$sesion->getEmpleado()->getCurp()."'";
	$result = $db->executeQuery($qry);
	while($fila = mysql_fetch_array($result))
	{		
		echo "<tr class='tr-cont'>";
		echo "<td>".$fila["fecha"]."</td>";
		echo "<td>".$fila["Nombre"]."</td>";
		echo "<td>".$fila["asunto"]."</td>";
		echo "<td class='opc'><img src='../img/busc.png' onclick=\"viewDetails();\" alt='Modificar'class='clickable'/></td>";
		echo "</tr>";
	}
?>

</table>

