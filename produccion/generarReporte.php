<?php include("../php/AccessControl.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Thank You</title>
		<link rel="stylesheet" type="text/css" href="common.css" />
	</head>
	<body>
		<?php					
			
			echo "<h2>".$_POST["tipoReporte"]."</h2>";
			echo "<h2>".$_POST["fechaInicio"]."</h2>";
			echo "<h2>".$_POST["fechaFin"]."</h2>";
			echo "<h2>".$_POST["ordenamiento"]."</h2>";
			
			$fechaInicio = $_POST["fechaInicio"];
			$fechaFin = $_POST["fechaFin"];
			
			if($fechaInicio<$fechaFin)
				echo "<h2>Fechas OK</h2>";
			else if($fechaInicio==$fechaFin)
					echo "<h2>Fechas Iguales</h2>";
				else
					echo "<h2>Fechas Incorrectas</h2>";
		
		?>
		
	</body>
</html>