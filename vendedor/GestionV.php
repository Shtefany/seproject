<?php include("../php/AccessControl.php"); ?>
<<<<<<< HEAD
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gestión de Ventas</title>
        <link rel="stylesheet" type="text/css" href="../css/ventas.css" />
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css" />
 
    </head>    
    <body>
	 <?php include('header.php');?>   
	   <center>
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
            <nav>
			      <div id="GV" class="selected-button" onClick="window.location ='GestionV.php'"><img src="../img/archive.png"  alt="Icono" class="img-icon"/>Gestión de Ventas</div>     
					<div id="GC" class="button" onClick="window.location ='GestionC.php'"><img src="../img/card.png"  alt="Icono" class="img-icon"/>Gestión de Clientes</div>
					<div id="rep" class="button" onClick="window.location ='Reportes.php'"><img src="../img/notepad.png"  alt="Icono" class="img-icon"/>Crear Reportes</div>
			</nav>
			<!-- Divisor del contenido de la pagina -->
            <div id="all-content">
                <div class="box">
                    <div id="AV" class="form-button" onClick="window.location ='Registrar_Venta.php'">Registar Venta</div>
		            <input type="text" id="buscar" name="buscar" placeholder = "Buscar Venta (RFC,FolioVenta)" class="searchBar" onChange="onClickBusqueda();" style="width:250px;"/>
			   </div>
    			   <div id="tablaVenta"><?php include("TablaVentas.php"); ?></div>
				</div>
            </div>  
        </center>
 <?php include("../php/footer.php"); ?>      
    </body>   
</html>
<?php include('scripts.php');?> 
=======
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Gestión de Ventas</title>
        <link rel="stylesheet" type="text/css" href="../css/ventastyle/styleV.css" />
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
                <img src="../img/RVenta.png" alt="Registrar Venta" width="120" height="30" usemap="#map5"/>
    				<map name="map5" id="map5">
		            	<area shape="rect" coords="0,0,120,30" alt="shape" title= "Registrar Venta" href="Registrar_Venta.php"/>
		            </map></div>
		            <input type="text" id="buscar" name="buscar" placeholder = "Buscar Venta" class="searchBar" onChange="onClickBusqueda();"/>
					<!--<div id="busc"><img src="../img/busc.png" class="img-buscar"  alt="Buscar" onClick="onClickBusqueda();"/></div>-->
    			    <div id="tablaVenta">
						<?php include("TablaVentas.php"); ?>
					</div>
				</div>
    			
            </div>  
        
        
    </body>   
</html>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
<script type="text/javascript">
	/* Genera la tabla de empleados */
	function onClickBusqueda(){
		loadTable();
	}
	/*Redirige a la pagina de modificar cliente*/
	function modificarVenta(id){
		window.location ="Modificar_Venta.php?id="+	id;
		console.log("Modificar_Venta.php?id=" + id);
	}
	
	/*Confirma y elimina el cliente*/
	function cancelarVenta(id){
		if ( confirm("¿Seguro que desea cancelar la venta con Folio " + id +"?") ){
			sendPetitionQuery("CancelaVenta.php?id=" + id );
			alert("Venta Cancelada");
			loadTable();
		}
	}

	/*Carga la tabla de cliente de acuerdo al filtro de busqueda*/
	function loadTable(){
		filtro = document.getElementById('buscar').value;
		sendPetitionSync("TablaVentas.php?search=" + filtro,"tablaVenta",document);
		rePaint();
	}	
<<<<<<< HEAD
</script>
=======
</script>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
