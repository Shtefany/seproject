<!--
	GestionEmpleado.php
	Última modificación: 12/04/2013
	
	Pantalla principal de la gestión de empleados
	
	- Documentación del código: OK
-->
<?php include("../php/AccessControl.php"); ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gestionar Producto</title>
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
					<h2>Gestión de Productos</h2>
					<div class="box">
						<div onclick="redirect('AltasProducto.php');" class="form-button">Agregar Producto</div>
						<input type="text" id="buscar" name="buscar" placeholder = "Buscar en los productos" class="searchBar" style="width:250px;"/>
						<img src="../img/busc.png" class="img-buscar"  alt="Buscar" onClick="onClickBusqueda();"/>
					</div>					
					<div id="tablaProducto" class="box">
						<?php include("TablaProducto.php"); ?>
					</div>				
            </div>			
        </div>
        </center>
        <?php include("../php/footer.php"); ?>
    </body>   
</html>
<?php include("scripts.php"); ?>
<script type="text/javascript">
	/* Genera la tabla de productos */
	function onClickBusqueda(){
		loadTable();
	}
	
	/*Redirige a la pagina de modificar empleado*/
	function modificarProducto(id){
		redirect("AltasProducto.php?id="+ id);
	}
	
	/*Confirma y elimina el producto*/
	function eliminarProducto(id,nombre){
		if ( confirm("¿Desea eliminar el producto " + nombre + "?") ){
			sendPetitionQuery("EliminarProducto.php?id=" + id );
			alert("El producto ha sido eliminado exitosamente");
			loadTable();
		}
	}

	/*Carga la tabla de empleado de acuerdo al filtro de busqueda*/
	function loadTable(){
		filtro = document.getElementById('buscar').value;
		sendPetitionSync("TablaProducto.php?search=" + filtro ,"tablaProducto",document);
		rePaint();
	}	
</script>