<?
    
	include("../php/Empleado.class.php");

	$curp = $_POST["ide"];
	echo($curp);

	$result = Empleado::Eliminar($curp);
	if($result != false)
	{
		echo ('<script type="text/javascript">
		alert("El empleado ha sido eliminado exitosamente");	
		window.location="GestionEmpleado.php";
		</script>');
	}
	else
	{
		echo ('<script type="text/javascript">
		 alert("Error al intentar eliminar el empleado");	
		window.location="GestionEmpleado.php";
		</script>');
	}

?>