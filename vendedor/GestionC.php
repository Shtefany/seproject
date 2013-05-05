<?php include("../php/AccessControl.php"); ?>
<<<<<<< HEAD
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gestión de Clientes</title>
        <link rel="stylesheet" type="text/css" href="../css/ventas.css" />
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
        
    </head>    
    <body>
    <?php include('header.php');?>   
    <center>
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
		<nav>
			      <div id="GV" class="button" onClick="window.location ='GestionV.php'"><img src="../img/archive.png"  alt="Icono" class="img-icon"/>Gestión de Ventas</div>     
				  <div id="GC" class="selected-button" onClick="window.location ='GestionC.php'"><img src="../img/card.png"  alt="Icono" class="img-icon"/>Gestión de Clientes</div>
				  <div id="rep" class="button" onClick="window.location ='Reportes.php'"><img src="../img/notepad.png"  alt="Icono" class="img-icon"/>Crear Reportes</div>
		</nav>
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
     </center>   
       
    </body>   
</html>
<?php include('scripts.php');?> 
=======
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
			<!-- Divisor del contenido de la pagina -->
           <div id="all-content">
				<br/>
                <!--<div class="titulo">GESTIÓN DE VENTAS</div>-->
                <div id="AV">
                	<img src="../img/RCliente.png" alt="Registrar Cliente" width="120" height="30" usemap="#map5"/>
    				<map name="map5" id="map5">
		            	<area shape="rect" coords="0,0,120,30" alt="shape" title= "Registrar Cliente" href="RC.php"/>
		            </map></div>
		            <input type="text" id="buscar" name="buscar" placeholder = "Buscar Cliente" class="searchBar" onChange="onClickBusqueda();"/>
					<!--<div id="busc"><img src="../img/busc.png" class="img-buscar"  alt="Buscar" onClick="onClickBusqueda();"/></div>busca-->
					<div id="tablaCliente">
						<?php include("TablaClientes.php"); ?>
					</div>
         </div>  </div>
        
       
    </body>   
</html>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
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
<<<<<<< HEAD
			alert("Empleado eliminado");
=======
			alert("Cliente eliminado");
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
			loadTable();
		}
	}
	function recuperarCliente(id){
		if ( confirm("¿Seguro que desea recuperar al cliente con RFC " + id +"?") ){
			sendPetitionQuery("RecuperarCliente.php?id=" + id );
<<<<<<< HEAD
			alert("Empleado Recuperado");
=======
			alert("Cliente Recuperado");
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
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