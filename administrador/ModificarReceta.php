<!DOCTYPE html>
<?
include("Clases/Producto.class.php");
$idPROD=$_POST["ide"];
$db = new DataConnection();
$db->executeQuery("Update  producto set Nombre='".$_POST["nombreP"]."', Precio=".$_POST["precioP"]." where idProducto=".$idPROD.";");

	if($db!=false)
	{
		echo '<script>';
		echo 'alert("El producto ha sido modificado exitosamente");';
		echo '</script>';
	}
	else
	{
		echo '<script>';
		echo 'alert("Error al intentar modificar el producto");';
		echo '</script>';	
	}




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
            </nav>
            <div id="all-content">
				
                <h2>Modificar la receta</h2>
				
				
				<form id="cambioBox" name="cambioBox">
                    <div class="box">
                        <h4>Receta</h4>
                        <div class="option">
							<select id="ingrediente" name="ingrediente" onchange="isNew()">
								<?
									echo "<option value=0>-</option>";
									include("../php/DataConnection.class.php");
									$db = new DataConnection();
									$result = $db->executeQuery("SELECT Nombre FROM materiaprima");	
									$count=1;
									while($fila=mysql_fetch_array($result))
									{										
										$id = $fila['idMateriaPrima'];
										$nombre = $fila['Nombre'];
										echo "<option value=".$id.">".$nombre."</option>";
										$count=$count+1;
									}
									echo "<option value=".$count.">Nuevo Ingrediente</option>";
								?>
							</select></div>                                             
                    </div>
				</form>
				<form id="altasReceta" name="altasReceta" method="POST" action="UpdateReceta.php">
				<?
				echo '<input id="ideProducto" name="ideProducto" type="hidden" value="'.$idPROD.'"/>';
                echo "<div class='box'>";
				
				echo '<table id="table-aux" name="table-aux">';
				echo '<tbody id="cuerpoT" name="cuerpoT">';
										echo '<tr id="titulosTr" class="tr-header">';
										echo '<td>Ingrediente</td>';
										echo '<td>Cantidad necesaria</td>';
										echo '<td> </td>';
										echo '</tr>';
				
				include("../php/DataConnection.class.php");
				$db = new DataConnection();
				$result = $db->executeQuery("SELECT * FROM receta where idProducto=".$idPROD);
				$contador=1;
				while($fila=mysql_fetch_array($result))
									{										
										$idMP = $fila['idMateriaPrima'];										
										$cantidad = $fila['Cantidad'];
										
										echo "<tr class='tr-cont' id='".$idMP."' name='".$idMP."'>";
										echo	"<td><input id='ide".$contador."' name='ide".$contador."' type='text' value='".$idMP."'></td>";
										echo	"<td><input id='cantidad".$contador."' name='cantidad".$contador."' type='text' value='".$cantidad."'></td>";
										echo	"<td class='opc'><img src='../img/less.png' onclick='quitarIngrediente(".$idMP.")' name='quitar'/></td>";
										echo  "</tr>";
										$contador++;
								}
				echo '</tbody>';
				echo '</table>';
				echo '</div>';
				?>
				<div class="box">
					<div class="form-button" onClick="validarReceta()">Aceptar</div>
                 </div>
                </form>    
                </div>
				
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>