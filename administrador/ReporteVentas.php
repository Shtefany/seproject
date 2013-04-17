<!DOCTYPE html>
<?php include("../php/AccessControl.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Reporte</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>    
    <body>
    	 <?php include("header.php"); ?>

        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('GestionEmpleado.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión Empleados</div>
               	<div class="button" onclick="redirect('GestionReceta.php');"><img src="../img/note.png"  alt="Icono" class="img-icon" />Gestión Recetas</div>
				<div class="button" onclick="redirect('GestionProducto.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Gestión Productos</div>
                <div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
            </nav>
            <div id="all-content">
				<br/>
                <h2>Consultar Reportes</h2>
                <form name="Rvalida">
                	<div id="content">
                    <div id="fechini" class="box">
                       Periodo: 
					   <input type="text" id="from" name="from" placeholder="Fecha de inicio"/> 
					   <input type="text" id="to" name="to" placeholder="Fecha de fin"/>
                    </div>
                    <div id="cliente1"class="box">
						<table>
								<tr>
									<td>Cliente:</td>
									<td class="auxiliarB"><select name="cliente"><option value="null">-</option><option valu="C1">Cliente1</option></select></td>
									<td class="auxiliarB"></td>
									<td class="auxiliarB"></td>
								</tr>
						</table>
                       
                    </div> 
                    <div id="producto1"class="box">
						<table>
								<tr>
									<td>Producto:</td>
									<td class="auxiliarB"><select name="producto"><option value="null">-</option><option value="G1">Galleta1</option></select></td>
									<td class="auxiliarB"></td>
									<td class="auxiliarB"></td>
								</tr>
						</table>
                       
                    </div> 
                    <div id="r1" class="box">
					<table>
								<tr>
									<td>Pedidos:</td>
									<td><input type="radio" name="filtro" value="Pedidos" onClick="aparece()"></td>
									<td>Ventas</td>
									<td><input type="radio" name="filtro" value="Ventas" onClick="aparece()"></td>
								</tr>
								<tr>
									<td>Estado:</td>
									<td><select name="pedidos" disabled><option>-</option><option>Todo</option><option>Vendido</option><option>Cancelado</option><option>En espera</option></select></td>
									<td>Estado:</td>
									<td><select name="ventas" disabled><option>-</option><option>Todo</option><option>Reportado</option><option>Devuelto</option></select></td>
									<td></td>
								</tr>
					</table>
					</div> 
		            
                    <div class="box">
                        <div class="form-button" onClick="redirect('../pdf/reporte.pdf');"">Aceptar</div>
						<div class="form-button" onClick="redirect('Reportes.php');">Cancelar</div>
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