<?php 

	include("../php/Validations.class.php");
	$id    =	Validations::cleanString($_GET['idProducto']);		
	if($_GET['numeroFilas']==0)
	{
		echo ": La receta es un atributo obligatorio";
		return;
	}		
	$filas=$_GET['numeroFilas'];
	for ($i=1; $i <= $filas; $i++) 
	{		
		if (!Validations::validaFloat($_GET['cantidad'.$i]))
		{
			echo "INPUT_PROBLEM";
			return;
		}			
			
	}
		
	
	
	//agregamos los valores de la receta... si no es modificar

	include("../php/DataConnection.class.php");
	$db = new DataConnection();
	$query="delete from receta where idProducto='".$id."'";
	$db->executeQuery($query);
	
	for ($i=1; $i <= $filas; $i++) 
	{
		$db = new DataConnection();
		$query="insert into receta values('".$id."','".$_GET['materiaPrima'.$i]."','".$_GET['cantidad'.$i]."')";
		$db->executeQuery($query);			
		if($db==false)
		{
			echo "DATABASE_PROBLEM";
			return;
		}
	}
		
	echo "OK";
	

?>