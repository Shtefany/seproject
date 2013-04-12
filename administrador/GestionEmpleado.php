<!--
	GestionEmpleado.php
	Última modificación: 11/04/2013
	
	Pantalla principal de la gestión de empleados
	
	- Documentación del código: OK
-->
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
						<div onclick="redirect('AgregarEmpleado.php');" class="form-button">Agregar Empleado</div>
						<input type="text" id="buscar" name="buscar" placeholder = "Buscar en los empleados" class="searchBar" style="width:250px;"/>
						<img src="../img/busc.png" class="img-buscar"  alt="Buscar" onClick="onClickBusqueda();"/>
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
	/* Genera la tabla de empleados */
	function onClickBusqueda(){
		loadTable();
	}
	
	/*Redirige a la pagina de modificar empleado*/
	function modificarEmpleado(id){
		redirect("AgregarEmpleado.php?id=" + id);
	}
	
	/*Confirma y elimina el empleado*/
	function eliminarEmpleado(id){
		if ( confirm("¿Seguro que desea eliminar al empleado con CURP " + id +"?") ){
			sendPetitionQuery("EliminaEmpleado.php?id=" + id );
			alert("Empleado eliminado");
			loadTable();
		}
	}

	/*Carga la tabla de empleado de acuerdo al filtro de busqueda*/
	function loadTable(){
		filtro = document.getElementById('buscar').value;
		sendPetitionSync("TablaEmpleados.php?search=" + filtro ,"tablaEmpleado",document);
		rePaint();
	}	
</script>