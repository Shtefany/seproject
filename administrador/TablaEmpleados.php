﻿<?php
	/*
		TablaEmpleados.php
		Última modificación: 2013-05-01
		
		Genera la tabla de empleados dinamicamente.
		
		Recibe:
			$_GET["search"] : filtro de la búsqueda de empleados en CURP o Nombre
			
		- Documentación del código: OK	

		Actualización del 1 de mayo:
			- Se corrigen los titulos de la tabla
			- Se conviere el documento a UTF-8
			- Se fijan los tamaños de cada columna
		
	*/
	header('Cache-Control: no-cache, no-store, must-revalidate');
?>
<table id='table-content'>
	<tr class='tr-header'>
		<td style='width:180px;'>CURP</td>
		<td style='width:220px;'>Nombre del empleado</td>
		<td style='width:230px;'>Dirección</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	$db = new DataConnection();	
	$qry = "SELECT * FROM Empleado";
	
	// Añade parametros de búsqueda
	if ( isset($_GET["search"] ) ){ 
		$filtro = Validations::cleanString($_GET["search"]); // Limpia la entrada
		$qry .= " WHERE CURP LIKE '%".$filtro."%' OR Nombre LIKE '%".$filtro."%'";
	}
	
	$result = $db->executeQuery($qry);	
	
	if ( mysql_num_rows($result) < 1){
		echo ("<tr class='tr-cont'>
			<td colspan='3'>No se encontraron resultados</td>
			<td class='opc'></td>
			<td class='opc'></td>
		</tr>");
	}else{	
		/* Agrega los resultados */
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
	}	
?>
</table>