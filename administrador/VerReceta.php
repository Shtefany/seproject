<!--
	AgregarEmpleado.php
	Última modificación: 11/04/2013
	
	Agrega empleado o los modifica
	
	Recibe: 
		$_GET["id"] : RFC del empleado a modificar ó
					  sin definir cuando se va a agregar uno nuevo
	
	- Documentación del código: OK
-->
<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Ver Receta</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>  
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('GestionEmpleado.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión Empleados</div>
                <div class="button" onclick="redirect('GestionProducto.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Gestión Productos</div>
               	<div class="button" onclick="redirect('GestionReceta.php');"><img src="../img/note.png"  alt="Icono" class="img-icon" />Gestión Recetas</div>
   				<div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
            </nav>
            <div id="all-content">
			<h2 id="titulo">Ver Receta</h2>
			<div id="content">
				
				<table id='table-content'>
						<tr class='tr-header'>
							<td>idMateriaPrima</td>
							<td>Nombre</td>
							<td>Cantidad</td>
							<td>Unidad</td>
						</tr>
				<?php
					
					include("../php/DataConnection.class.php");
					$db = new DataConnection();
					$idProd=$_GET["id"];
					$qry = "SELECT * FROM Receta natural join materiaprima where idProducto='".$idProd."';";
					$result = $db->executeQuery($qry);	
					while($fila = mysql_fetch_array($result))
					{		
						$idProd = $fila['idMateriaPrima'];	
						$nombreMP = $fila['Nombre'];
						$cantidad = $fila['Cantidad'];
						$unidad = $fila['Unidad'];
						
						echo ("<tr class='tr-cont' id='".$idProd."' name='".$idProd."'>
							<td>".$idProd."</td>
							<td>".$nombreMP."</td>
							<td>".$cantidad."</td>
							<td>".$unidad."</td>						
							</tr>");
					}
				?>
				</table>
				
				<div class="box">
						<div id="buttonOK" class="form-button" onclick="redirect('GestionReceta.php');">Aceptar</div>
                 </div>
				 
			</div>
				 
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<script type="text/javascript">
	var modify = false;
</script>
<?php include("scripts.php"); ?>
