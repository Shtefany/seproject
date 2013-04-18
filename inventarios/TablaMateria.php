<table id='table-content'>
	<tr class='tr-header'>
		<td>id Producto</td>
		<td>Nombre</td>
		<td>Proveedor</td>
		<td>Precio por unidad ($)</td>
		<td>Cantidad</td>
		<td>Unidad</td>
		<td>Fecha de Caducidad</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	include("../php/DataConnection.class.php");

	$db = new DataConnection();	
	$qry = "SELECT mp.idMateria, mp.nombre, 
			p.nombre as proveedor, mpr.precio_lote, mpr.cantidad,
			mp.unidad, mp.fecha_caducidad
			from materia_prima mp, proveedor p, 
			materia_proveedor mpr where mp.idMateria = mpr.idMateria and 
			p.RFC = mpr.proveedor_RFC";	

	if ( isset($_GET["search"] ) ){
	$filtro = Validations::cleanString($_GET["search"]);
	$qry .= " WHERE mp.idMateria LIKE '%".$filtro."%' OR mp.nombre LIKE '%".$filtro."%'";
	}

	$result = $db->executeQuery($qry);	
	
	
	while($fila = mysql_fetch_array($result))
	{		
		$idm = $fila['idMateria'];	
		$nombre = $fila['nombre'];
		$proveedor = $fila['proveedor'];
		$precio = $fila['precio_lote'];
		$cantidad = $fila['cantidad'];
		$unidad = $fila['unidad'];
		$fecha_C = $fila['fecha_caducidad'];


		echo "<tr class='tr-cont' id='".$idm."' name='".$idm."'>
			<td>".$idm."</td>
			<td>".$nombre."</td>
			<td>".$proveedor."</td>
			<td>".$precio."</td>
			<td>".$cantidad."</td>
			<td>".$unidad."</td>
			<td>".$fecha_C."</td>
			<td class='opc'><img src='../img/pencil.png'/></td>
			<td class='opc'><img src='../img/less.png'/></td>
		</tr>";
	}
?>

</table>