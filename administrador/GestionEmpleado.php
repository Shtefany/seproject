<?php include("../php/AccessControl.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gestionar Empleado</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>    
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
			<nav>			
				<div class="selected-button" onclick="redirect('GestionEmpleado.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión Empleados</div>
                <div class="button" onclick="redirect('GestionProducto.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Gestión Productos</div>
                <div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
			</nav>
			
            <div id="all-content">
				<div id="content">
					<h2>Gestión de Empleados</h2>
					<div class="box">
						<table>
							<tr>
								<td class="auxiliarB">
									<div onclick="redirect('AgregarEmpleado.php');" class="form-button">Agregar Empleado</div>
								</td>
								<td class="auxiliarB"></td>
								<td class="auxiliarB"></td>
								<td class="auxiliarB">
									<input type="text" id="buscar" name="buscar" placeholder = "Buscar en los empleados" class="searchBar"/>
								</td>
								<td>
									<img src="../img/busc.png" class="img-buscar"  alt="Buscar" onClick="onClickBusqueda();"/>
								</td>
							</tr>

						</table>
					</div>   
					<div id="tablaEmpleado" class="box">
						<?php include("TablaEmpleados.php"); ?>
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
<script type="text/javascript">
	function onClickBusqueda(){
		loadTable();
	}

	function modificarEmpleado(id){
		
	}

	function eliminarEmpleado(id){
		sendPetitionQuery("EliminaEmpleado.php?id=" + id );
		alert("Empleado eliminado");
		loadTable();
	}
	
	function loadTable(){
		filtro = document.getElementById('buscar').value;
		sendPetitionSync("TablaEmpleados.php?search=" + filtro ,"tablaEmpleado",document);
		rePaint();
	}
	
</script>