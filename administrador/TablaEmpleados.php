<?php header('Cache-Control: no-cache, no-store, must-revalidate'); ?>
<table id='table-content'>
	<tr class='tr-header'>
		<td>idEmpleado</td>
		<td>Nombre</td>
		<td>Direccion</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	$db = new DataConnection();	
	$qry = "SELECT * FROM Empleado";
	
	if ( isset($_GET["search"] ) ){
		$filtro = Validations::cleanString($_GET["search"]);
		$qry .= " WHERE CURP LIKE '%".$filtro."%' OR Nombre LIKE '%".$filtro."%'";
	}
	
	$result = $db->executeQuery($qry);	
	
	if ( mysql_num_rows($result) < 1){
		echo ("<tr class='tr-cont'>
			<td></td>
			<td></td>
			<td></td>
			<td class='opc'></td>
			<td class='opc'></td>
		</tr>");
	}
	
	while($fila = mysql_fetch_array($result))
	{		
		$id = $fila['CURP'];	
		$nombre = $fila['Nombre'];
		$direccion = $fila['Direccion'];
		$pass = $fila['Contrasena'];

		echo ("<tr class='tr-cont' id='".$id."' name='".$id."'>
			<td>".$id."</td>
			<td>".$nombre."</td>
			<td>".$direccion."</td>
			<td class='opc'><img src='../img/pencil.png' onclick='modificarEmpleado(\"".$id."\")' alt='Modificar' class='clickable'/></td>
			<td class='opc'><img src='../img/less.png'   onclick='eliminarEmpleado(\"".$id."\")' alt='Eliminar' class='clickable'/></td>
		</tr>");
	}
	
?>
</table>