<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbname = 'autoc';
 
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
 
	$return_arr = array();
 
	/* If connection to database, run sql statement. */
	if ($conn){
		include('Funciones.php');
		$sql = "SELECT * 
		FROM ingrediente WHERE nombre LIKE '%" . mysql_real_escape_string($_GET['term']) . "%';";
		//$fetch = mysql_query($sql);
		$datos = ejecutarConsulta($sql);
     
    	/* Retrieve and store in array the results of the query.*/
    	while ($row = mysql_fetch_array($datos, MYSQL_ASSOC)) {
			$row_array['id'] = $row['idingrediente'];
			$row_array['value'] = $row['nombre'];			
			$row_array['disp'] = $row['disponibilidad'];			
			$row_array['proveedor'] = obtenerProveedor($row['idproveedor']);
			
        	array_push($return_arr, $row_array);
    	}
	}
 
	/* Free connection resources. */
	mysql_close($conn);
 
	/* Toss back results as json encoded array. */
	echo json_encode($return_arr);
?>