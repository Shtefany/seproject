<?php header('Cache-Control: no-cache, no-store, must-revalidate'); ?>
<table id="table-content">
	<tr class="tr-header">
		<td>iDProducto</td>
		<td>Nombre</td>
		<td>Precio</td>
		<td class="opc"> </td>
		<td class="opc"> </td>
	</tr>
<?php								
	include("../php/DataConnection.class.php");
	$db = new DataConnection();	
	$qry = "SELECT * FROM Producto";	
	if ( isset($_GET["search"] ) ){
		$filtro = $_GET["search"];
		$qry .= " WHERE Nombre LIKE '%".$filtro."%'";
	}	
	
	$result = $db->executeQuery($qry);	
	
	if ( mysql_num_rows($result) < 1 ){
		echo "<tr class='tr-cont'>";
		echo	"<td></td>";
		echo	"<td></td>";
		echo	"<td></td>";
		echo	"<td class='opc'></td>";
		echo	"<td class='opc'></td>";
		echo  "</tr>";	
	}
	
	while($fila=mysql_fetch_array($result))
	{										
		$id = $fila['idProducto'];										
		$nombre = $fila['Nombre'];
		$precio = $fila['Precio'];		
		echo "<tr class='tr-cont' id='".$id."' name='".$id."'>";
		echo	"<td>".$id."</td>";
		echo	"<td>".$nombre."</td>";
		echo	"<td>".$precio."</td>";
		echo	"<td class='opc'><img src='../img/pencil.png' onclick='modificarProducto(".$id.")' alt='Modificar' name='modificar'/></td>";
		echo	"<td class='opc'><img src='../img/less.png' onclick='eli(".$id.")' alt='Eliminar' name='eliminar'/></td>";
		echo  "</tr>";	
	}
	
?>
</table>