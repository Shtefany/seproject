<!--
	AgregarEmpleado.php
	Última modificación: 11/04/2013
	
	Agrega empleado o los modifica
	
	Recibe: 
		$_GET["id"] : RFC del empleado a modificar ó
					  sin definir cuando se va a agregar uno nuevo
	
	- Documentación del código: OK
-->
<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Modificar Receta</title>
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
               	<div class="selected-button" onclick="redirect('GestionReceta.php');"><img src="../img/note.png"  alt="Icono" class="img-icon" />Gestión Recetas</div>
            </nav>
            <div id="all-content">
			<h2 id="titulo">Modificar Receta</h2>
			<div id="content">
				<div id="recetaTitle" class="box">
                         <p>Seleccione el ingrediente para agregar a la receta </p>
								<table>
										<tr>
										<td>Ingrediente</td>
										<td><?php include("SelectIngrediente.php"); ?></td>
										<td><div class="form-button" onclick="AddMP();">Agregar a la lista</div></td>
										</tr>
								</table>
								
                </div>
				<table id='table-aux' style="padding-left:30px">
				<tbody id="cuerpoT">
						<tr class='tr-header'>
							<td>Ingrediente</td>
							<td>Unidad</td>
							<td>Cantidad necesaria (1000 galletas)</td>
							<td> </td>
						</tr>
				<?php
					
					include("../php/DataConnection.class.php");
					$db = new DataConnection();
					$idProd=$_GET["id"];
					echo "<input type='hidden' id='ideProducto' name='ideProducto' value='".$idProd."'/>";	
					$qry = "SELECT * FROM Receta natural join materiaprima where idProducto='".$idProd."';";
					$result = $db->executeQuery($qry);									
					while($fila = mysql_fetch_array($result))
					{		
						$idMP = $fila['idMateriaPrima'];	
						$nombreMP = $fila['Nombre'];
						$cantidad = $fila['Cantidad'];
						$unidad = $fila['Unidad'];
						echo (
							"<tr class='tr-cont' id='".$idMP."' name='".$idMP."'>
							<input type='hidden' id='MP".$idMP."' name='MP".$idMP."' value='".$idMP."' class='ides'/>
							<td>".$nombreMP."</td>
							<td>".$unidad."</td>	
							<td><input type='text' id='cantidad".$idMP."' name='cantidad".$idMP."' value='".$cantidad."' class='cantidades' onblur=\"valida(this.value,'msgCantidad".$idMP."','cantidad')\"/></td>
							<td><img src='../img/less.png' onclick='quitarIngrediente(\"".$idMP."\")' alt='Ver' class='clickable'/></td>
						    <td><span id='msgCantidad".$idMP."'></span></td>
							</tr>");
					}
				?>
				</tbody>
				</table>
				
				<div class="box">
						<div id="cancel" class="form-button" onclick="modificarReceta();">Modificar</div>
						<div id="buttonOK" class="form-button" onclick="redirect('GestionReceta.php');">Cancelar</div>
						
                 </div>
				 
			</div>
				 
            </div>
			
        </div>
        </center>
        <?php include("../php/footer.php"); ?>
    </body>   
</html>
<script type="text/javascript">
	var modify = false;
</script>
<?php include("scripts.php"); ?>
<script type="text/javascript" src="../js/manejoProductos.js"></script>
<script type="text/javascript">
	function modificarReceta(){		
		parametros = "idProducto=" + document.getElementById('ideProducto').value;
		var arrayElements = new Array();
		var arrayElementsIDES = new Array();
	    arrayElements = document.getElementsByClassName("cantidades");					
		arrayElementsIDES = document.getElementsByClassName("ides");		
		for(i=1;i<=arrayElements.length;i++)
		{
			parametros+="&materiaPrima"+i+"="+arrayElementsIDES[i-1].value;				
			parametros+="&cantidad"+i+"="+arrayElements[i-1].value;	
		}
		parametros+="&numeroFilas="+arrayElements.length;
		parametros = parametros.replace("#","%23");
		sendPetitionQuery("ModReceta.php?" + encodeURI(parametros));
		console.log("ModReceta.php?" + encodeURI(parametros));
		/* returnedValue almacena el valor que devolvio el archivo PHP */
		if (returnedValue == "OK" ){
			alert("La receta ha sido modificada exitosamente");
			window.location = "./GestionReceta.php";
		}
		else if ( returnedValue == "DATABASE_PROBLEM"){
			alert("No se pudo establecer conexión con la base de datos");
		}
		else if ( returnedValue == "INPUT_PROBLEM"){
			alert("Datos con formato inválido");
		} else {
			alert ("Error al intentar modificar la receta "+ returnedValue);
		}
	}
</script>