<?php
	$iding = $_REQUEST['iding'];

	include('conexion.php');
	include('Funciones.php');

	$sqlnew = "SELECT * FROM ingrediente WHERE idingrediente = '$iding';";
	$res = ejecutarConsulta($sqlnew);

	echo '<table id="table-content">';
	echo '<tr class="tr-header">';
	echo '<th>Identificador del Ingrediente</th>';
	echo '<th>Nombre del Ingrediente</th>';
	echo '<th>Cantidad Disponible</th>';	
	echo '<th>Nombre del Proveedor</th>';
	echo '</tr>';

	while($row = mysql_fetch_array($res)){
		echo '<tr class="tr-cont">';
		echo '<td>'.$row['idingrediente'].'</td>';
		echo '<td>'.$row['nombre'].'</td>';
		echo '<td>'.$row['disponibilidad'].'</td>';						
		echo '<td>';
		echo obtenerProveedor($row['idproveedor']);
		echo '</td>';								
		echo '</tr>';
	}

	echo '</table>';

?>