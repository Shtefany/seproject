<?php
	header('Cache-Control: no-cache, no-store, must-revalidate');
?>
<table id='table-content'>
	<tr class='tr-header'>
		<td>Número de Lote</td>
		<td>Producto Asociado</td>
		<td>Unidades Producidas</td>                  
		<td>Fecha de Elaboración</td>
		<td>Fecha de Caducidad</td>  
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
		echo ("<tr class='tr-cont'>
			<td colspan = '6'>No se encontraron resultados</td>
		</tr>");
	}else{	
		/* Agrega los resultados */
		while($fila = mysql_fetch_array($result)){		
			$nolote = $fila['noLote'];	
			$producto = $fila['productoAsociado'];
			$cantidad = $fila['cantidadProducto'];			
			$elaboracion = $fila['fechaElaboracion'];
			$caducidad = $fila['fechaCaducidad'];
/*
			$edo = utf8_encode($fila["estado"]);
			if($edo == "produccion"){
				$estado = "producción";
			}
			else{
				$estado = $edo;
			}
*/
			echo ("<tr class='tr-cont' id='".$nolote."' name='".$nolote."'>
				<td>LO-".$nolote."</td>
				<td>".getCookieById($producto)."</td>
				<td>".$cantidad." paquetes</td>				
				<td>".$elaboracion."</td>
				<td>".$caducidad."</td>																		
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
<?php
	function getCookieById($id){
		$db = new DataConnection();
		$consulta = "SELECT * FROM catalogoproductos 
		WHERE idProducto = '".$id."';";
		$res = $db->executeQuery($consulta);
		if(mysql_num_rows($res) < 1){
			return "no hay";
		}		
		else{
			while($fila = @mysql_fetch_array($res)){
				$nombre = $fila["nombreProducto"];
			}
			return $nombre;
		}
		return 0;
	}
?>