<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Modulo de Producción</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>    
    <body>
    	 <?php include("header.php"); ?>

        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('ConsultarIngredientes.php');">
                	<img src="../img/search.png" alt="Icono" class="img-icon" />
                    	Consultar Disponibilidad de Ingredientes
				</div>
                <div class="button" onclick="redirect('ConsultarPedidos.php');">
                	<img src="../img/clock.png"  alt="Icono" class="img-icon" />
                    	Consultar Pedidos en Espera
				</div>
                <div class="button" onclick="redirect('CrearReporte.php');">
                	<img src="../img/notepad.png"  alt="Icono" class="img-icon" />
                    	Crear Reporte
				</div>
                <div class="button" onclick="redirect('GestionarLineas.php');">
                	<img src="../img/way.png"  alt="Icono" class="img-icon" />
                    	Gestión de Líneas
				</div>                
                <div class="selected-button" onclick="redirect('GestionarLotes.php');">
                	<img src="../img/note.png"  alt="Icono" class="img-icon" />
                    	Gestión de Lotes
				</div>                                
            </nav>
            <div id="all-content">				
				<div id="content">
                	<h2>Gestión de Lotes</h2>
                    <div class="box">
                        <input type="text" id="buscar" name="buscar" placeholder="Ingresa el # del lote" 
                        class="searchBar" style="width:250px;" />
                        <img src="../img/busc.png" class="img-buscar" alt="Buscar" 
                        onClick="onClickBusqueda();" />
                    </div><!--box-->
                    <div id="tablaLote" class="box">
                    	<?php include("TablaLotes.php"); ?>
                    </div><!--tablaLinea-->
                </div><!--content-->              
			</div>
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>
<script type="text/javascript">
	/* Genera la tabla de empleados */
	function onClickBusqueda(){
		loadTable();
	}
	
	/*Confirma y elimina el empleado*/
	function eliminarLote(nolote){
		if ( confirm("¿Seguro que desea eliminar el lote #" + nolote +"?") ){
			sendPetitionQuery("EliminarLote.php?nolote=" + nolote );
			alert("Lote eliminado");
			loadTable();
		}
	}	
	
	/*Redirige a la pagina de modificar empleado*/
	function modificarLote(nolote){
		redirect("AgregarLote.php?nolote=" + nolote);
	}

	/*Carga la tabla de empleado de acuerdo al filtro de busqueda*/
	function loadTable(){
		filtro = document.getElementById('buscar').value;
		sendPetitionSync("TablaLotes.php?search=" + filtro , "tablaLote", document);
		rePaint();
	}	
</script>