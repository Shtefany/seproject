<?php include("../php/AccessControl.php"); ?>
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
				
                <!--<div class="titulo">GESTIÓN DE VENTAS</div>-->
                <div class="box">
                    <div id="AV" class="form-button" onClick="window.location ='Registrar_Venta.php'">Registar Venta</div>
		            <input type="text" id="buscar" name="buscar" placeholder = "Buscar Venta" class="searchBar" onChange="onClickBusqueda();"/>
			   </div>
    			   <div id="tablaVenta"><?php include("TablaVentas.php"); ?></div>
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
</script>