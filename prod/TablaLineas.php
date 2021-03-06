<?php
	header('Cache-Control: no-cache, no-store, must-revalidate');
?>
<table id='table-content'>
	<tr class='tr-header'>
		<td>Número de Producción</td>
		<td>Identificador de Línea</td>
		<td>Encargado de Línea</td>        
		<td>Estado</td>                
		<td>Número de Lote Asociado</td>
		<td colspan="3">Opciones</td>
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/Validations.class.php");
	include("clases/Lote.class.php");	
	$db = new DataConnection();	
	$qry = "SELECT * FROM LineaProduccion";
	
	// Añade parametros de búsqueda
	if ( isset($_GET["search"] ) ){ 
		$filtro = Validations::cleanString($_GET["search"]); // Limpia la entrada
		$qry .= " WHERE nolinea LIKE '%".$filtro."%'";
	}
		
	$result = $db->executeQuery($qry);	
	
	if ( mysql_num_rows($result) < 1){
		echo ("<tr class='tr-cont'>
			<td colspan='8'>No se encontraron resultados</td>
		</tr>");
	}else{	
		/* Agrega los resultados */
		while($fila = mysql_fetch_array($result)){		
			$noprod = $fila["numproduccion"];
			$nolinea = $fila['nolinea'];	
			$encargado = $fila['encargadoLinea'];
			$nolote = $fila['nolote'];
			$edo = utf8_encode($fila["estado"]);
			if($edo == "produccion"){
				$estado = "producción";
			}
			else{
				$estado = $edo;
			}			

			echo ("<tr class='tr-cont' id='".$noprod."' name='".$noprod."'>
				<td>PROD-".$noprod."</td>
				<td>".$nolinea."</td>
				<td>".obtenerNombre($encargado)."</td>
				<td>".$estado."</td>				
				<td>LO-".$nolote."</td>
				<td>
				<img src='../img/pencil.png' 
				onclick='modificarProduccion(\"".$noprod."\")' alt='Modificar' class='clickable'/></td>
				<td>
				<img src='../img/less.png' 
				onclick='eliminarProduccion(\"".$noprod."\")' alt='Eliminar' class='clickable'/></td>");
				
			$milote = Lote::findById($nolote);
			echo ("<td>
					<img src='../img/search.png'
					onclick='detalleLote(\"".$nolote."\", 
					\"".getCookieById($milote->getProducto())."\", 
					\"".$milote->getCantidad()."\",
					\"".$milote->getElaboracion()."\",
					\"".$milote->getCaducidad()."\")' 
					alt'Detalle de Lote' class='clickable' />
				</td>
			</tr>");
		}
	}	
?>
</table>
<?php
	//Obtener el nombre del Empleado
	function obtenerNombre($CURP){
		include("../php/Empleado.class.php");	
		$empleado = Empleado::findById($CURP);
		$nombre = $empleado->getNombre();
		return $nombre;
	}

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
