<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Administrador</title>
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
								
					<div class="box">
						
						<table>
							<tr>
								<td class="auxiliarB">
									<div class="form-button" onclick="redirect('AltasProducto.php');">Agregar Producto</div>
								</td>
								<td class="auxiliarB"></td>
								<td class="auxiliarB"></td>
								<td class="auxiliarB">
									<input type="text" name="buscar"/>
								</td>
								<td>
									<img src="../img/busc.png" class="img-buscar"  alt="Bucar" />
								</td>
							</tr>
						</table>
					</div>   
					<div class="divTable">
					<?
									echo "<table id='table-content'>";
									echo "<tr class='tr-header'>";
									echo	"<td>iDProducto</td>";
									echo	"<td>Nombre</td>";
									echo	"<td>Precio</td>";
									echo	"<td class='opc'> </td>";
									echo	"<td class='opc'> </td>";
									echo  "</tr>";
									include("../php/DataConnection.class.php");
									$db = new DataConnection();
									$result = $db->executeQuery("SELECT * FROM producto");	
									
									while($fila=mysql_fetch_array($result))
									{										
										$id = $fila['idProducto'];										
										$nombre = $fila['Nombre'];
										$precio = $fila['Precio'];
										
										echo "<tr class='tr-cont' id='".$id."' name='".$id."'>";
										echo	"<td>".$id."</td>";
										echo	"<td>".$nombre."</td>";
										echo	"<td>".$precio."</td>";
										echo	"<td class='opc'><img src='../img/pencil.png' onclick='modificarProducto(".$id.")' alt='Modificar' name='modificar'/></td>";
										echo	"<td class='opc'><img src='../img/less.png' onclick='eli(".$id.")' alt='Eliminar' name='eliminar'/></td>";
										echo  "</tr>";
									
									}
									echo "</table>"
					?>
								
					</div>
					
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>