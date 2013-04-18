<?php
	$idproducto = $_REQUEST['producto'];
	$linea = $_REQUEST['linea'];	//Nombre de la linea
	$from = $_REQUEST['from'];
	$to = $_REQUEST['to'];
	$id = $_REQUEST['id'];
	
	//echo '*****RECIBIDOS*****<br />';
	//echo $id . '<br />' . $idproducto . '<br />' . $linea . '<br />' . $from . '<br />' . $to . '<br />';

	$datefrom = mysql_real_escape_string($from);
	$datefrom = date('Y-m-d', strtotime(str_replace('-', '/', $datefrom)));		
	
	$dateto = mysql_real_escape_string($to);
	$dateto = date('Y-m-d', strtotime(str_replace('-', '/', $dateto)));
	
	include('conexion.php');
	include('Funciones.php');
	
	$idlinea = obtenerIdLinea($linea);
	//echo $idlinea;
 
	$sql = "UPDATE
	Lote SET productoAsociado = '$idproducto', lineaProduccion = '$idlinea', 
	fechaElaboracion = '$datefrom', fechaCaducidad = '$dateto'
	WHERE idLote = '$id';";
	//echo $sql;

	if (!ejecutarConsulta($sql)){
		die('Error: ' . mysql_error());
	}
	else{
		$sqlnew = "SELECT * FROM Lote WHERE idLote = '$id';";
		$res = ejecutarConsulta($sqlnew);
		echo '<table id="table-content">';
		echo '<tr class="tr-header">';
		echo '<th>Número de Lote</th>';
		echo '<th>Nombre del Producto</th>';
		echo '<th>Linea de Producción</th>';
		echo '<th>Fecha de Elaboracion</th>';
		echo '<th>Fecha de Caducidad</th>';								
		echo '</tr>';
		
		while($row = mysql_fetch_array($res)){
			echo '<tr class="tr-cont">';
			echo '<td>'.$row['idLote'].'</td>';
			echo '<td>'.$row['productoAsociado'].'</td>';
			echo '<td>'.$row['lineaProduccion'].'</td>';						
			echo '<td>'.$row['fechaElaboracion'].'</td>';						
			echo '<td>'.$row['fechaCaducidad'].'</td>';												
			echo '</tr>';
		}
		echo '</table>';
	}
 
?>