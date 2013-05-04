<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Gestión de Clientes</title>
        <link rel="stylesheet" type="text/css" href="../css/ventastyle/styleC.css"/>
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
        <?php include('scripts.php');?> 
    </head>    
    <body>
    <?php include('header.php');?>   
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
		<?php include('Menu.php');?>
            <!--<div id="mainDiv">
			<!-- Divisor del contenido de la pagina -->
           <div id="all-content">
				<div class="box">
				<div id="AC" class="form-button" onClick="window.location ='RC.php'">Registar Cliente</div>
			        <input type="text" id="buscar" name="buscar" placeholder = "Buscar Cliente" class="searchBar" onChange="onClickBusqueda();"/>
				</div>
				<div id="tablaCliente"><?php include("TablaClientes.php"); ?></div>
         </div>  
         </div>
        
       
    </body>   
</html>
<script type="text/javascript">
	/* Genera la tabla de empleados */
	function onClickBusqueda(){
		loadTable();
	}
	/*Redirige a la pagina de modificar cliente*/
	function modificarCliente(id){
		window.location ="RC.php?id=" + id;	
	}
	
	/*Confirma y elimina el cliente*/
	function eliminarCliente(id){
		if ( confirm("¿Seguro que desea eliminar al cliente con RFC " + id +"?") ){
			sendPetitionQuery("EliminaCliente.php?id=" + id );
			alert("Empleado eliminado");
			loadTable();
		}
	}
	function recuperarCliente(id){
		if ( confirm("¿Seguro que desea recuperar al cliente con RFC " + id +"?") ){
			sendPetitionQuery("RecuperarCliente.php?id=" + id );
			alert("Empleado Recuperado");
			loadTable();
		}
	}
	/*Carga la tabla de cliente de acuerdo al filtro de busqueda*/
	function loadTable(){
		filtro = document.getElementById('buscar').value;
		sendPetitionSync("TablaClientes.php?search=" + filtro,"tablaCliente",document);
		rePaint();
	}	
</script>