<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Alta de Ingrediente</title>
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
				
               <h2>Ingresar Materia Prima</h2>
                <div id="content">
                    <div class="box">
                       Nombre: <input type="text" id="name" name="name" placeholder="Escriba su nombre"/>
                    </div>

                    <div class="box">
                       Nombre: <input type="text" id="provider" name="provider" placeholder="Escriba el proveedor"/>
                    </div>

                    <div class="box">
                        Cantidad: <input type="number" id="canditad" name="cantidad" min="0" max="10000">
                    </div>

                    <div class="box">
                        Precio: <input type="number" id="precio" name="precio" min="0" max="1000000"> $
                    </div>

                    <div class="box">
                       Fecha inicial: <input type="text" id="from" name="from" placeholder="Fecha de Llegada"/>
                    </div>
                    <div class="box">
                       Fecha de caducidad: <input type="text" id="to" name="to" placeholder="Fecha de caducidad"/> 
                    </div>
                    <div class="box">
                        <div class="form-button" onClick="aceptInventario()">Ingresar a Inventario</div>
						<div class="form-button" onClick="cancelarIngrediente()">Cancelar</div>
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