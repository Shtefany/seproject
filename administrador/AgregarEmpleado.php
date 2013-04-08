<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Agregar Empleado</title>
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
				
                <h2>Agregar Empleado</h2>
				<form id="altaEmpleado" action="AgregaEmp.php"name="altaEmpleado" method ="POST">
				<div id="content">
                    <div class="box">
					<table>
					<tr>
                       <td>Nombre: </td>
					   <td><input id="nombre" name="nombre" type="text" placeholder="Nombre del Empleado"/></td>
                    </div>
                    <tr>
					  <td>CURP: </td>
					  <td><input id="curp" name="curp" type="text" placeholder="CURP"/> </td>
                    </tr>
                    <tr>
					  <td>Dirección: </td>
					  <td><input id="dir" name="dir" type="text" placeholder="Direccion"/></td>
                    </tr>
                     <tr>
					 <td>Contraseña: </td>
					 <td><input id="pass" name="pass" type="password" placeholder="Contraseña "/> </td>
                    </tr>
					</table>
                    <div class="box">
                            <p>Seleccione el área a la que será asignado el empleado </p>
			                Área: <select name="area">
                                          <option>Compras</option>
                                          <option>Control de Calidad</option>
                                          <option>Inventario</option> 
                                          <option>Producción</option>
                                          <option>Ventas</option>
                                  </select>
                        </div>
                    <div class="box">
						<input type="submit" class="form-button" value="Aceptar"/>
                        <div class="form-button" onclick="redirect('GestionEmpleado.php')">Cancelar</div>	
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


