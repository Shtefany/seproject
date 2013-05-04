<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Modulo de Producción</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
        <script src="../js/jquery-1.9.1.js"></script>
        <script>
		$(function() {
			$( ".datePicker" ).datepicker({										
				showAnim: "fold",
				duration: 1000,
				changeMonth: true,					
				changeYear: true
			});				
		});
		$(function() {							
			$( "#criteriosMatPrima" ).hide();								
			$("#selectTipo").change(function(){
				if($("#selectTipo").val()=="matPrima"){
					$( "#criteriosMatPrima" ).show(800);
					$( "#criteriosLotes" ).hide();
				}
				if($("#selectTipo").val()=="lotes"){
					$( "#criteriosLotes" ).show(800);
					$( "#criteriosMatPrima" ).hide();
				}	
			});																						
			/*
			$('#formReporte').bind('submit', function(e) {
				e.preventDefault();
				$.Zebra_Dialog('The link was clicked!');
			});
			*/	
		});
		//$('html').bind('click', function(e) {
		//e.preventDefault();
		//$.Zebra_Dialog('The link was clicked!');
		//});
		/*$.Zebra_Dialog('<strong>Zebra_Dialog</strong>, a small, compact and highly' + 
		'configurable dialog box plugin for jQuery');*/
		</script> 				        
    </head>    
    <body>
    	 <?php include("header.php"); ?>

        <center>
        <div id="mainDiv">
            <nav>
<!--            
                <div class="button" onclick="redirect('ConsultarIngredientes.php');">
                	<img src="../img/search.png" alt="Icono" class="img-icon" />
                    	Consultar Disponibilidad de Ingredientes
				</div>
-->                
                <div class="selected-button" onclick="redirect('CrearReporte.php');">
                	<img src="../img/notepad.png"  alt="Icono" class="img-icon" />
                    	Crear Reporte
				</div>
                <div class="button" onclick="redirect('GestionarLineas.php');">
                	<img src="../img/way.png"  alt="Icono" class="img-icon" />
                    	Gestión de Líneas
				</div>                
                <div class="button" onclick="redirect('GestionarLotes.php');">
                	<img src="../img/note.png"  alt="Icono" class="img-icon" />
                    	Gestión de Lotes
				</div>      
                <div class="button" onclick="redirect('ConsultarPedidos.php');">
                	<img src="../img/clock.png"  alt="Icono" class="img-icon" />
                    	Gestión de Pedidos
				</div>                                                                   
            </nav>
            <div id="all-content">				
                <h2>Creación de Reportes de Producción</h2>                
                <form id="formReporte" action="procesarReporte.php" method="POST">
                	<p>
                    	Seleccione el tipo de reporte:
                    </p>
                    <p>
                    	<select name="tipoReporte" id="selectTipo" class="entrada">
                        	<option value="lotes">Reporte de Lotes</option>
                        	<option value="matPrima">Reporte de Materia Prima</option>
                        </select>
                    </p>
                    <p>
                    	Ingrese la Fecha Inicial:
                    </p>
                    <p>
                    	<input type="text" class="datePicker entrada" id="fechaInicio" 
                        name="fechaInicio" />
                    </p>
                    <p>
                    	Ingrese la Fecha Final:
                    </p>
                    <p>
                    	<input type="text" class="datePicker entrada" id="fechaFin"
                        name="fechaFin" />
                    </p>
                    <p>
                    	Ordenar resultados por:
                    </p>
                    <p>
                    	<select name="ordenamientoLotes" id="criteriosLotes" class="entrada">
                    		<option value="fechaElaboracion">Fecha de Producción</option>                    	
                    		<option value="linea">Línea de Producción</option>
							<option value="nombreProducto">Producto</option>                        
                        </select>
                    </p>
                    <p>
						<select name="ordenamientoMatPrima" id="criteriosMatPrima" class="entrada">
                    		<option value="proveedor">Proveedor</option>
							<option value="matPrima">Materia Prima</option>                    	
                    		<option value="linea">Línea de Producción</option>						
                		</select>	                    
                    </p>
                    <input type="submit" class="form-button" id="botonCrear" value="Generar Reporte" />

			</div>
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>