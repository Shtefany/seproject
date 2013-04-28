<?php
	/*
		TablaLineas.php
		Última modificación: 21/04/2013		
		
		Genera la tabla de líneas dinamicamente.
		
		Recibe:
			?????$_GET["search"] : filtro de la búsqueda de línea
	*/
	header('Cache-Control: no-cache, no-store, must-revalidate');
?>
<table id='table-content'>
	<tr class='tr-header'>
		<td>Número de Lote</td>
		<td>Producto Asociado</td>
		<td>Fecha de Elaboración</td>
		<td>Fecha de Caducidad</td>  
		<td>Línea de Producción</td>          
        <td colspan="2">Opciones</td>      
		<!--<td class='opc'></td>
		<td class='opc'> </td>-->
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	//Obtener Conexion
	$db = new DataConnection();	
	//Obtener todos los datos de la tabla lote
	$qry = "SELECT * FROM Lote";
	
	// Añade parametros de búsqueda
	if ( isset($_GET["search"] ) ){ 
		$filtro = Validations::cleanString($_GET["search"]); // Limpia la entrada
		//Condicion para la busqueda
		$qry .= " WHERE nolote LIKE '%".$filtro."%'";
	}
	//Ejecutar consulta
	$result = $db->executeQuery($qry);	
	
	if ( mysql_num_rows($result) < 1){
/*		echo ("<tr class='tr-cont'>
			<td colspan='3'>No se encontraron resultados</td>
			<td class='opc'></td>
			<td class='opc'></td>
		</tr>");
*/
		echo ("<tr class='tr-cont'>
			<td colspan = '6'>No se encontraron resultados</td>
		</tr>");
	}else{	
		/* Agrega los resultados */
		while($fila = mysql_fetch_array($result)){		
			$nolote = $fila['noLote'];	
			$producto = $fila['productoAsociado'];
			$elaboracion = $fila['fechaElaboracion'];
			$caducidad = $fila['fechaCaducidad'];
			$linea = $fila['lineaProduccion'];

			echo ("<tr class='tr-cont' id='".$nolote."' name='".$nolote."'>
				<td>".$nolote."</td>
				<td>".$producto."</td>
				<td>".$elaboracion."</td>
				<td>".$caducidad."</td>				
				<td>".$linea."</td>								
				<td>
				<img src='../img/pencil.png' onclick='modificarLote(\"".$nolote."\")' alt='Modificar' class='clickable'/>
				</td>
				<td>
				<img src='../img/less.png'   onclick='eliminarLote(\"".$nolote."\")' alt='Eliminar' class='clickable'/>
				</td>
			</tr>");
		}
	}	
?>
</table>