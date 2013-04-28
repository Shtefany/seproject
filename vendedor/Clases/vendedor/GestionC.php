<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Gestión de Clientes</title>
        <link rel="stylesheet" type="text/css" href="css/styleC.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css"/>
        
        <link href="themes/redmond/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />
		<link href="scripts/jtable/themes/metro/blue/jtable.min.css" rel="stylesheet" type="text/css" />
		<script src="scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
	    <script src="scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    	<script src="scripts/jtable/jquery.jtable.js" type="text/javascript"></script>
    	
		<!--<script type="text/javascript" src="js/jquery-1.5.1.js"></script>
		<script type="text/javascript" src="js/jquery.ui.core.js"></script>
		<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
		<script type="text/javascript" src="js/mootools.js"></script>-->
		<script type="text/javascript" src="js/textoexp.js"></script>
		<script type="text/javascript" src="js/ajustam.js"></script> 
		<script type="text/javascript" src="js/valida_RC.js"></script>
		<?php include('scripts.php');?> 
		<!--<script type="text/javascript" src="js/jtableclie.js"></script>-->

    </head>    
    <body>
	<!--El header es el mismo para todas las paginas-->
    <?php include('header.php');?>   
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
            <?php include('Menu.php');?> 
			<!-- Divisor del contenido de la pagina -->
           <div id="all-content">
				<br/>
                <!--<div class="titulo">GESTIÓN DE VENTAS</div>-->
                <div id="AV"><img src="../img/RCliente.png" alt="Registrar Cliente" width="120" height="30" usemap="#map5"/>
    				<map name="map5" id="map5">
		            	<area shape="rect" coords="0,0,120,15" alt="shape" title= "Registrar Cliente" href="RC.html"/>
		            </map></div>
		            <div id="bus"><input type="text" id="buscar" name="buscar" placeholder="Buscar"/></div>
    			<div id="busico" name"busico">
    				<img src="../img/busc.png" alt="busca" width="20" height="20" usemap="#map6"/>
    				<map name="map6" id="map6">
		            	<area shape="rect" coords="0,0,20,20" alt="shape" title= "Buscar" href="#"/>
		            </map>
    			</div>
    			<div id="Table"></div>
	           <script type="text/javascript">

		$(document).ready(function () {

		    //Prepare jTable
			$('#Table').jtable({
				title: 'Clientes',
				paging: true,
				pageSize: 4,
				sorting: true,
				defaultSorting: 'RFC ASC',
				actions: {
					listAction: 'PersonActionsPagedSorted.php?action=list',
					createAction: 'PersonActionsPagedSorted.php?action=create',
					updateAction: 'PersonActionsPagedSorted.php?action=update',
					deleteAction: 'PersonActionsPagedSorted.php?action=delete'
				},
				fields: {
					RFC: {
						key: true,
						update: true,
						edit: true,
						title: 'RFC'
					},
					Nombre: {
						title: 'Cliente',
						width: '20%'
					},
					Telefono: {
						title: 'Teléfono',
						width: '20%'
					},
					Email: {
						title: 'E-mail',
						width: '20%'
					},
					Direccion: {
						title: 'Dirección',
						width: '20%'
					}
				}
			});
			//Load person list from server
			$('#Table').jtable('load');

		});

	</script>
         </div>  
        </center>
       
    </body>   
</html>