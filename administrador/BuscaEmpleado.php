<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gestionar Empleado</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>    
    <body>
    	<?php include("header.php"); 
		?>
        <center>
        <div id="mainDiv">
           <nav>
			
                <div class="button" onclick="redirect('GestionEmpleado.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión Empleados</div>
                <div class="button" onclick="redirect('GestionProducto.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Gestión Productos</div>
                <div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
            
			</nav>
            <div id="all-content">
				
                
				<div id="content">
				
					<div class="box">
						<form name="Find" action="GestionEmpleado.php" method="POST">
						<table>
						
							<tr>
								<td class="auxiliarB">
									<div onclick="redirect('AgregarEmpleado.php');" class="form-button">Agregar Empleado</div>
								</td>
								<td class="auxiliarB"></td>
								<td class="auxiliarB"></td>
								<td class="auxiliarB">
									<input type="text" id="buscar" name="buscar" placeholder = "CURP del empleado"/>
								</td>
								<td>
									<img type="submit" src="../img/busc.png" class="img-buscar"  alt="Buscar" />
								</td>
							</tr>

						</table>
						</form>
					</div>   
					<div class="box">
		
					<table id="table-content">
								<tr class="tr-header">
									<td>iDEmpleado</td>
									<td>Nombre</td>
									<td>&Aacute;rea</td>
									<td>Direcci&oacute;n</td>
									<td class="opc"> </td>
								</tr>
						<?php				
	include("../php/Empleado.class.php");
	$curp = $_POST['buscar'];
	$result = Empleado::BuscaEmpleado($curp);
	
	
	?>
	
	</table> 
					</div>
					
                    </div>
                </div>
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>