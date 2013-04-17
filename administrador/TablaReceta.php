<?php
	/*
		TablaEmpleados.php
		Última modificación: 11/04/2013		
		
		Genera la tabla de empleados dinamicamente.
		
		Recibe:
			$_GET["search"] : filtro de la búsqueda de empleados en CURP o Nombre
			
		- Documentación del código: OK		
	*/
	header('Cache-Control: no-cache, no-store, must-revalidate');
?>
<table id='table-content'>
	<tr class='tr-header'>
		<td>idProducto</td>
		<td>Nombre</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	$db = new DataConnection();	
	$qry = "SELECT * FROM Producto";
	
	// Añade parametros de búsqueda
	if ( isset($_GET["search"] ) ){ 
		$filtro = Validations::cleanString($_GET["search"]); // Limpia la entrada
		$qry .= " WHERE Nombre LIKE '%".$filtro."%' OR idProducto LIKE '%".$filtro."%'";
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
			$id = $fila['idProducto'];	
			$nombre = $fila['Nombre'];

			echo ("<tr class='tr-cont' id='".$id."' name='".$id."'>
				<td>".$id."</td>
				<td>".$nombre."</td>
				<td class='opc'><img src='../img/notepad.png' onclick='verReceta(\"".$id."\")' alt='Ver' class='clickable'/></td>
				<td class='opc'><img src='../img/pencil.png' onclick='modificarReceta(\"".$id."\")' alt='Modificar' class='clickable'/></td>
			</tr>");
		}
	}	
?>
</table>