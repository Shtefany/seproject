<!--
	AltasProducto.php
	Última modificación: 2013-05-01
	
	Da de alta un producto
	
	- Codificacion UTF-8 OK
-->
<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Producto</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>  
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('GestionEmpleado.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión Empleados</div>
                <div class="selected-button" onclick="redirect('GestionProducto.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Gestión Productos</div>
               	<div class="button" onclick="redirect('GestionReceta.php');"><img src="../img/note.png"  alt="Icono" class="img-icon" />Gestión Recetas</div>
            </nav>
            <div id="all-content">
				<h2 id="titulo">Agregar Producto</h2>
				<form id="altaProducto" action="AgregaProd.php"name="altaProducto" method ="POST">
				<input id="idProducto" name="idProducto" type="hidden"/>
				<div id="content">
                    <div class="box">
					<table class="form-table">						
						<tr>
						   <td>Nombre: </td>
						   <td><input id="nombreP" name="nombreP" type="text" placeholder="Nombre del Producto" onblur="valida(this.value,'msgNombre','nombre');"/></td>
						   <td><span id="msgNombre"></span></td>
						</tr>
						<tr>
							<td>Precio: </td>
							<td><input id="precioP" name="precioP" type="text" placeholder="Precio" onblur="valida(this.value,'msgPrecio','precio');"/></td>
							<td><span id="msgPrecio"></span></td>
						</tr>						
					</table>
					</div>
					<?php
					if ( !isset($_GET["id"]) ){
					?>
					<div id="recetaTitle" class="box">
						<h2>Asignar Receta</h2>
                         <p>Seleccione el ingrediente para agregar a la receta </p>
						<table>
							<tr>
								<td>Ingrediente</td>
								<td><?php include("SelectIngrediente.php"); ?></td>
								<td><div class="form-button" onclick="AddMP();">Agregar a la lista</div></td>
							</tr>
						</table>
                    </div>
					<div id="recetaTable" class="box">
						<table id="table-aux" style="padding-left:30px;">
							<tbody id="cuerpoT" name="cuerpoT">
								<tr id="titulosTr" class="tr-header">
								<td>Ingrediente</td>
								<td>Unidad</td>
								<td>Cantidad necesaria (1000 galletas)</td>
								<td></td>
								</tr>
							</tbody>
						</table>
					</div> 
					<?php } ?>
					<div class="box">
                        <div id="buttonOK" class="form-button" onClick="agregarProducto();">Aceptar</div>
						<div id="buttonCancel" class="form-button" onClick="redirect('GestionProducto.php');">Cancelar</div>
                    </div>
						
                </div>
				</form>
            </div>
			
        </div>
        </center>
        <?php include("../php/footer.php"); ?>
    </body>   
</html>
<script type="text/javascript">
	var modify = false;
</script>

<?php
	/*
		Verifica si es la opcion de modificar un producto, si lo es, agrega los scripts y carga los datos correspondientes
	*/
	include("../php/Producto.class.php");
	if ( isset($_GET["id"]) ){
		$emp = $_GET["id"];
		$encontrado = Producto::findById($emp);
?>
	<script type="text/javascript">
	
		document.getElementById('idProducto').value = "<?php echo $encontrado->getId(); ?>";
		document.getElementById('nombreP').value = "<?php echo $encontrado->getNombre(); ?>";
		document.getElementById('precioP').value = "<?php echo $encontrado->getPrecio(); ?>";
		document.getElementById('titulo').innerHTML = "Editar Producto";
		document.getElementById('buttonOK').innerHTML = "Editar";
		modify = true;
	</script>
<?php
	}
?>
<!-- Agrega los scripts de la pantalla y el modulo -->
<?php include("scripts.php"); ?>
<script type="text/javascript" src="../js/manejoProductos.js"></script>
<script type="text/javascript">
	/* Agrega el producto a la base de datos */
	function agregarProducto(){
		
		parametros = "idProducto=" + document.getElementById('idProducto').value + "&";
		parametros += "nombreP=" + document.getElementById('nombreP').value + "&";
		parametros+= "precioP=" + document.getElementById('precioP').value;
		if(!modify)
		{
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
		}
		if ( modify ){
			parametros +="&edit=1";
		}
		
		parametros = parametros.replace("#","%23");
		sendPetitionQuery("AgregaProd.php?" + encodeURI(parametros));
		console.log("AgregaProd.php?" + encodeURI(parametros));
		/* returnedValue almacena el valor que devolvio el archivo PHP */
		if (returnedValue == "OK" ){
			if ( modify ){
				alert("El producto ha sido editado exitosamente");
			}else{
				alert("El producto ha sido agregado exitosamente");
			}
			window.location = "./GestionProducto.php";
		}
		else if ( returnedValue == "DATABASE_PROBLEM"){
			alert("No se pudo establecer conexión con la base de datos");
		}
		else if ( returnedValue == "INPUT_PROBLEM"){
			alert("Datos con formato inválido");
		} else {
			alert (returnedValue);
		}
	}
</script>