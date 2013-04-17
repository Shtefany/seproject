<!DOCTYPE html>
<?php include("../php/AccessControl.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Solicitar Reporte</title>
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
				
                <form id="SolicitarRepo" name="SolicitarRepo">
				<div id="content">
					<h2>Reportes </h2>
					<div class="box">
						<div class="option"><select id="tipo_reporte" name="tipo_reporte"><option value="null">-</option><option value="Ventas">Ventas</option><option value="Errores">Errores</option><option value="Proveedores">Proveedores</option><option value="Clientes Frecuentes">Clientes Frecuentes</option></select></div>                                             
					</div>   
					<div class="box">
                        <div class="form-button" onClick="validarReporte()">Aceptar</div>
						<div class="form-button" onClick="cancelarGeneral()">Cancelar</div>
                    </div>
                </div>
				</form>
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>