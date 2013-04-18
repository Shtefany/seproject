<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'root';
	$dbname = 'ingsoft';
 
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
 
	$return_arr = array();
 
	/* If connection to database, run sql statement. */
	if ($conn){
		$sql = "SELECT * FROM Producto WHERE nombreProducto LIKE '%" . mysql_real_escape_string($_GET['term']) . "%';";
		$fetch = mysql_query($sql);
		//$fetch = mysql_query("SELECT * 
		//FROM states where state like '%" . mysql_real_escape_string($_GET['term']) . "%'");
     
    	/* Retrieve and store in array the results of the query.*/
    	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
			//$row_array['value'] = $row['idProducto'];
			$row_array['value'] = $row['nombreProducto'];
        	array_push($return_arr, $row_array);
    	}
	}
 
	/* Free connection resources. */
	mysql_close($conn);
 
	/* Toss back results as json encoded array. */
	echo json_encode($return_arr);
?>