<?php

try
{
	//Open database connection
	$con = mysql_connect("localhost","root","");
	mysql_select_db("cliente", $con);

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get record count
		$result = mysql_query("SELECT COUNT(*) AS Cuenta FROM clie;");
		$row = mysql_fetch_array($result);
		$recordCount = $row['Cuenta'];

		//Get records from database
		$result = mysql_query("SELECT * FROM clie ORDER BY " . $_GET["jtSorting"] . " LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		
		//Insert record into database
		/*$result = mysql_query("INSERT INTO clie VALUES('" . $_POST["RFC"] . "', '". $_POST["Nombre"] . "', '" . $_POST["Telefono"] . "', '". $_POST["Email"] . "', '" . $_POST["Direccion"]. "');");
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM clie WHERE RFC ='" . $_POST["RFC"] . "';");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);*/
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		
		//Update record in database
	$result = mysql_query("UPDATE clie SET Nombre='". $_POST["Nombre"] . "', Telefono='" . $_POST["Telefono"] . "', Email='". $_POST["Email"] . "', Direccion='" . $_POST["Direccion"]. "' where RFC='". $_POST["RFC"] . "';");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)*
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM clie WHERE RFC = '" . $_POST["RFC"] . "';");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection*/
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>