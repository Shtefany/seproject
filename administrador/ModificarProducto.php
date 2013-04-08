<!DOCTYPE html>
<?
include("Clases/Producto.class.php");
$prod = new Producto($_POST["ide"],"",0);
$encontrado=$prod->findById();
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Modificar Producto</title>
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
                <div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
            </nav>
            <div id="all-content">
				
                <h2>Modificar producto</h2>
				<form id="altasProducto" name="altasProducto" method="POST" action="ModificarReceta.php">
				<? echo "<input id='ide' name='ide' type='hidden' value='".$encontrado->getId()."'/>"; ?>
				<div id="content">
                    <div class="box">
                       Nombre:<? echo "<input id='nombreP' name='nombreP' type='text' value='".$encontrado->getNombre()."'/>"; ?>
                    </div>
                    <div class="box">
					   Precio:<? echo "<input id='precioP' name='precioP' type='text' value='".$encontrado->getPrecio()."'/>"; ?>
                    </div>                   
                    <div class="box">
                        <div class="form-button" onClick="validaModificar()">Aceptar</div>
						<div class="form-button" onClick="redirect('GestionProducto.php');">Cancelar</div>
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