<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>
<table id="table-content">
<?php	
/*Falta poner la condicion para que solo jale el mensaje seleccionado*/
	include("../php/DataConnection.class.php");	
	include("../php/AccessControl.php");	
	$db = new DataConnection();
	$qry = "SELECT * FROM Inbox,Mensajes,Empleado WHERE Mensajes.remitente=Empleado.CURP and Inbox.msg=Mensajes.id and Inbox.destinatario='".$sesion->getEmpleado()->getCurp()."'";
	$result = $db->executeQuery($qry);
	while($fila = mysql_fetch_array($result))
	{	
		echo "<tr class=\"tr-header\">";
		echo "<td colspan =\"2\"><h1>".$fila["asunto"]."</h1></td>";
		echo "</tr>";
		echo "<tr class='tr-cont'>";
		echo "<td>Recibido:</td><td>".$fila["fecha"]."</td>";
		echo "</tr>";
		echo "<tr class='tr-cont'>";
		echo "<td>Remitente:</td><td>".$fila["Nombre"]."</td>";
		echo "</tr>";
		echo "<tr class='tr-cont' >";
		echo "<td colspan =\"2\">".$fila["mensaje"]."</td>";
		echo "</tr>";
	}
?>
</table>

