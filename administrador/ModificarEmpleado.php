<!DOCTYPE html>
<?php
	include("../php/Empleado.class.php");
	$emp = $_POST["ide"];
	$encontrado = Empleado::findById($emp);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Modificar Empleado</title>
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
				
                <h2>Modificar empleado</h2>

				<form id="ModEmpleado" name="ModEmpleado" >
				<div id="content">

                    <div class="box">
                    <p>Cambie los datos a modificar</p>
					</div>
					<table>
					<tr>
                       <td>Nombre:</td>
					   <td><? echo "<input id='nombreP' name='nombreP' type='text' value='".$encontrado->getNombre()."'/>"; ?></td>
					</tr>
                    
                    <tr>
					  <td>CURP:</td>
					  <td><? echo "<input id='ide' name='ide' type='hidden' value='".$encontrado->getCurp()."'/>"; ?></td>
                    </tr>
                    <tr>
					  <td>Dirección:</td>
					  <td><? echo "<input id='dir' name='dir' type='text' value='".$encontrado->getDireccion()."'/>"; ?></td>
                    </tr>
                    <tr>
					 <td>Contraseña:</td>
					 <td><? echo "<input id='nombreP' name='nombreP' type='text' value='".$encontrado->getContrasena()."'/>"; ?></td>
                    <tr>
					</table>
                    <div class="box">
                            <p>Seleccione el área a la que será asignado el empleado </p>
			                Área: <select>
                                          <option>Compras</option>
                                          <option>Control de Calidad</option>
                                          <option>Inventario</option> 
                                          <option>Producción</option>
                                          <option>Ventas</option>
                                  </select>
                        </div>
                    <div class="box">
                        <div class="form-button" onClick="cancelarE()">Cancelar</div>
                        <div class="form-button" onClick="ModEmp()">Aceptar</div>
						
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