<?php
	$fecha = $_REQUEST['fecha'];
	$linea = $_REQUEST['linea'];
	$encargado = $_REQUEST['encargado'];
	$idproducto = $_REQUEST['producto'];
	$cantidad = $_REQUEST['cantidad'];
/*
	echo "*****RECIBIDOS*****<br />";
	echo $fecha . "<br />";
	echo $linea . "<br />";
	echo $encargado . "<br />";	
	echo $idproducto . "<br />";
	echo $cantidad . "<br />";			
	*/
	include('conexion.php');
	include('Funciones.php');

	//$producto = obtenerProducto($idproducto);
	//echo $producto;
 
	$sql = "INSERT 
	INTO produccion(numproduccion, fechaProduccion, lineaProduccion, encargadoProduccion, 
	productoProduccion, cantidadProducto) 
	VALUES('0', '$fecha' , '$linea', 'XXXXXXXXXXXXXXXXXX', '$idproducto', '100');";
	//echo $sql;
 
	if (!ejecutarConsulta($sql)){
		die('Error: ' . mysql_error());
	}
	else{
		$sqlnew = 'SELECT * FROM produccion ORDER BY numproduccion DESC LIMIT 1;';
		$res = ejecutarConsulta($sqlnew);
		
		echo '<table id="table-content">';
		echo '<tr class="tr-header">';
		echo '<th>Número de Producción</th>';
		echo '<th>Fecha de Producción</th>';
		echo '<th>Linea de Producción</th>';
		echo '<th>Encargado de Producción</th>';
		echo '<th>Id Producto a Producir</th>';								
		echo '<th>Cantidad de Producto</th>';										
		echo '</tr>';
		
		while($row = mysql_fetch_array($res)){
			echo '<tr class="tr-cont">';
			echo '<td>'.$row['numproduccion'].'</td>';
			echo '<td>'.$row['fechaProduccion'].'</td>';
			echo '<td>'.$row['lineaProduccion'].'</td>';						
			echo '<td>'.$row['encargadoProduccion'].'</td>';						
			echo '<td>'.$row['productoProduccion'].'</td>';												
			echo '<td>'.$row['cantidadProducto'].'</td>';															
			echo '</tr>';
		}
		echo '</table>';
	}

?>