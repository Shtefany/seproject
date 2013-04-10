<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Administrador</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>    
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
		 <nav>
                <div class="button" onclick="redirect('GestionEmpleado.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión Empleados</div>
                <div class="selected-button" onclick="redirect('GestionProducto.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Gestión Productos</div>
                <div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
         </nav>
        <div id="all-content">
					<h2>Gestión de Productos</h2>
					<div class="box">						
						<table>
							<tr>
								<td class="auxiliarB">
									<div class="form-button" onclick="redirect('AltasProducto.php');">Agregar Producto</div>
								</td>
								<td class="auxiliarB"></td>
								<td class="auxiliarB"></td>
								<td class="auxiliarB">
									<input type="text" name="buscar"/>
								</td>
								<td>
									<img src="../img/busc.png" class="img-buscar"  alt="Bucar" />
								</td>
							</tr>
						</table>
					</div>   
					<div class="divTable">
						<?php include("TablaProducto.php"); ?>								
					</div>					
            </div>			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>