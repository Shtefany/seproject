<!DOCTYPE html>
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
				<form id="altasProducto" name="altasProducto">
				<div id="content">
                    <div class="box">
                       Nombre:<input id="nombreP" name="nombreP" type="text" placeholder="Nombre del producto"/>
                    </div>
                    <div class="box">
					   Precio:<input id="precioP" name="precioP" type="text" placeholder="Precio del producto $"/> 
                    </div>
                    <div class="box">
                        <h4>Receta</h4>
                        <div class="option"><select name="ingrediente"><option value="null">-</option><option value="Ingrediente1">Ingrediente Uno</option></select></div>                                             
                    </div>  
                    <div class="box">
						<table id="table-aux">
								<tr class="tr-header">
									<td>Ingrediente</td>
									<td>Cantidad necesaria</td>
									<td> </td>
								</tr>
								<tr class="tr-cont">
									<td>-</td>
									<td>-</td>
									<td>
										<div class="evento"><img src="../img/less.png" alt="Eliminar" name="eliminar" /></div>
									</td>
								</tr>
								<tr class="tr-cont">
									<td>-</td>
									<td>-</td>
									<td>
										<div class="evento"><img src="../img/less.png" alt="Eliminar" name="eliminar"/></div>
									</td>
								</tr>
						</table>
					</div>       
                    <div class="box">
                        <div class="form-button" onClick="validaModificar()">Aceptar</div>
						<div class="form-button" onClick="cancelar()">Cancelar</div>
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