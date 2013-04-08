<?php 
	
	include("../php/Empleado.class.php");
	
	$nombre = $_POST['nombre'];
	$curp = $_POST['curp'];
	$password = $_POST['pass'];
	$direccion = $_POST['dir'];
	$area = $_POST['area'];
	
	$emp = new Empleado($curp,$nombre,$direccion,$area,$password);
	$acept = $emp->Agregar($curp,$nombre,$password,$area,$direccion);
	
	/*if(!$acept)
		echo("Fuck \n");
	else 
		echo("Ok\n");*/
	
	if(!$acept){
		echo (' 
		<script type="text/javascript"> 
			alert("No se pudo registrar  el empleado");
			window.location = "AgregarEmpleado.php";
			
			</script>
		
		');
	}
	else{
		echo ('
		<script type="text/javascript"> 
			alert("El empleado ha sido registrado exitosamente");
			window.location = "GestionEmpleado.php";
			
			</script>
		');
	}

?>