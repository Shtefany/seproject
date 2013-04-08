<!DOCTYPE html>
<?
include("Clases/Producto.class.php");
$prod = new Producto(0,$_POST["nombreP"],$_POST["precioP"]);
if($prod->findByName())
{
	echo '<script>';
	echo 'alert("El producto '.$_POST["nombreP"].' ya existe");';
	echo "window.location='GestionProducto.php'";
	echo '</script>';
}
else
{
	$resultado=$prod->Agregar();
	$productoRegistrado=$prod->findByName();
	$idPROD=$productoRegistrado->getId();
	if($resultado!=false)
	{
		echo '<script>';
		echo 'alert("El producto ha sido registrado exitosamente");';
		echo '</script>';
	}
	else
	{
		echo '<script>';
		echo 'alert("Error al intentar registrar el producto");';
		echo '</script>';	
	}

}


?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Agregar Producto</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
		
    </head>    
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('AltasProducto.php');"><img src="../img/back.png"  alt="Icono" />Regresar</div>
            </nav>
            <div id="all-content">
				
                <h2>Construcción de la receta</h2>
				
				
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
				<form id="altasReceta" name="altasReceta" method="POST" action="InsertReceta.php">
				<?php echo '<input id="ideProducto" name="ideProducto" type="hidden" value="'.$idPROD.'"/>';?>
                 <div class="box">
				
						<table id="table-aux" name="table-aux">
							<tbody id="cuerpoT" name="cuerpoT">
										<tr id="titulosTr" class="tr-header">
										<td>Ingrediente</td>
										<td>Cantidad necesaria</td>
										<td> </td>
										</tr>
							</tbody>
						</table>
				
				</div> 
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