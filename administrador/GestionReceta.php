<!--
	GestionEmpleado.php
	Última modificación: 12/04/2013
	
	Pantalla principal de la gestión de empleados
	
	- Documentación del código: OK
-->
<?php include("../php/AccessControl.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gestionar Receta</title>
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
				<div class="selected-button" onclick="redirect('GestionReceta.php');"><img src="../img/note.png"  alt="Icono" class="img-icon" />Gestión Recetas</div>
			   <div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
         </nav>
        <div id="all-content">
					<h2>Gestión de Recetas</h2>
					<div class="box">
						<input type="text" id="buscar" name="buscar" placeholder = "Buscar en los productos" class="searchBar" style="width:250px;"/>
						<img src="../img/busc.png" class="img-buscar"  alt="Buscar" onClick="onClickBusqueda();"/>
					</div>					
					<div id="tablaReceta" class="box">
						<?php include("TablaReceta.php"); ?>
					</div>				
        </div>			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>
<script type="text/javascript">
	/* Genera la tabla de productos */
	function onClickBusqueda(){
		loadTable();
	}
	
	/*Redirige a la pagina de modificar empleado*/
	function modificarReceta(id){
		redirect("ModificarReceta.php?id="+ id);
	}
	function verReceta(id){
		redirect("VerReceta.php?id="+ id);
	}

	/*Carga la tabla de empleado de acuerdo al filtro de busqueda*/
	function loadTable(){
		filtro = document.getElementById('buscar').value;
		sendPetitionSync("TablaReceta.php?search=" + filtro ,"tablaReceta",document);
		rePaint();
	}	
</script>