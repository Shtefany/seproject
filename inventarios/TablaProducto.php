<table id='table-content'>
	<tr class='tr-header'>
		<td>Id Producto</td>
		<td>Nombre</td>
		<td>Id Lote</td>
		<td>Precio ($)</td>
		<td>Fecha de Caducidad</td>
		<td class='opc'> </td>
		<td class='opc'> </td>
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");

	$db = new DataConnection();	
	$qry = "SELECT P.idProducto,P.nombre,L.idLote, P.Precio, L.fecha_caducidad
			from Producto P, Lote L
			where P.idLote = L.idLote";	


	if ( isset($_GET["search"] ) ){
	$filtro = Validations::cleanString($_GET["search"]);
		if($filtro != "")
		{
			if(is_numeric($filtro))
			{
				$qry .= " AND P.idProducto = ".$filtro;
			}
			else
			{
				$qry .= " AND (P.nombre LIKE '%".$filtro."%')";
			}
		}
	}

	$result = $db->executeQuery($qry);	
	
	
	
	while($fila = mysql_fetch_array($result))
	{		
		$idP = $fila['idProducto'];	
		$nombre = $fila['nombre'];
		$lote = $fila['idLote'];
		$precio = $fila['Precio'];
		$fecha_C = $fila['fecha_caducidad'];


		echo "<tr class='tr-cont' id='".$idm."' name='".$idm."'>
			<td>".$idP."</td>
			<td>".$nombre."</td>
			<td>".$lote."</td>
			<td>".$precio."</td>
			<td>".$fecha_C."</td>
			<td class='opc'><img src='../img/pencil.png'/></td>
			<td class='opc'><img src='../img/less.png'/></td>
		</tr>";
	}
?>

</table>