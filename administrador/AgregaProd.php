<?php 

	include("../php/Validations.class.php");
	include("../php/Producto.class.php");
	$id    =	Validations::cleanString($_GET['idProducto']);	
	$nombre    =	Validations::cleanString($_GET['nombreP']);
	$precio      =	Validations::cleanString($_GET['precioP']);

	
	if(!isset($_GET["edit"]))
	{
		$pruebaExiste=Producto::findByName($nombre);
		if($pruebaExiste)
		{
			echo ": El producto con nombre ".$nombre." ya existe";
			return;
		}
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
		
	}
	
	if ( Validations::validaNombre($nombre) && Validations::validaFloat($precio) ){
			if ( !isset($_GET["edit"]) ){
				$accept     =	Producto::Agregar($nombre,$precio);	
			}else{
				$accept     =	Producto::Modificar($id,$nombre,$precio);	
			}
			if(!$accept){
				echo "DATABASE_PROBLEM";
			}else{
				echo "OK";
			}
		
	}else{
		echo "INPUT_PROBLEM";
	}
	//agregamos los valores de la receta... si no es modificar
	if ( !isset($_GET["edit"]) ){
		include("../php/DataConnection.class.php");
		$filas=$_GET['numeroFilas'];
		$found=Producto::findByName($nombre);
		$id=$found->getId();
		for ($i=1; $i <= $filas; $i++) 
		{
			$db = new DataConnection();
			$query="insert into receta values('".$id."','".$_GET['materiaPrima'.$i]."','".$_GET['cantidad'.$i]."')";
			$db->executeQuery($query);						
		}
		
	}
	

?>