<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Crear Reporte de Producción</title>
		<?php include('scripts.php'); ?>
        <script src="js/script.js"></script>
		<script src="js/validaciones.js"></script>

		<script type="text/javascript">
		    window.onload = resizeWindow;
		    window.onresize = resizeWindow;
			<!-- Funcion para redimensionar la ventana-->
		    function resizeWindow() {
                var w = window.innerWidth;
                if (w < 1060) {
                    var newSize = w - 260;
                    var windowSize = w - 60;
                    document.getElementById("all-content").style.width = new String(newSize) + "px";
                    document.getElementById("mainDiv").style.width = new String(windowSize) + "px";
                    console.log(newSize);
                    console.log(document.getElementById("all-content").style.width);
                } else {
                    document.getElementById("all-content").style.width = "800px";
                    document.getElementById("mainDiv").style.width = "1000px";
                }
		    }
			
			$(function() {
				$( ".datePicker" ).datepicker({					
					/*showOn: "button",
					buttonImage: "img/calendar2.png",
					buttonImageOnly: true,
					buttonText: "Ver calendario",
					*/
					showAnim: "fold",
					duration: 1000,
					changeMonth: true,					
					changeYear: true
				});
				
				$( "#dialog-message" ).hide();
				 /*$( "#dialog-message" ).dialog({
					modal: true,
					autoOpen: false,
					show: {
						effect: "blind",
						duration: 1000
					},	
					hide: {
					effect: "explode",
					duration: 1000
					},
					
					buttons: {
					Ok: function() {
					$( this ).dialog( "close" );
					}
					}
				});
				
				$( "#botonCrear" ).click(function() {
					$( "#dialog-message" ).dialog( "open" );
				});			*/				
				
			});
			
			$(function() {							
				
				$( "#criteriosMatPrima" ).hide();								
				
				$("#selectTipo").change(function(){
					
					if($("#selectTipo").val()=="matPrima")
					{
						$( "#criteriosMatPrima" ).show(800);
						$( "#criteriosLotes" ).hide();
					}
					
					if($("#selectTipo").val()=="lotes")
					{
						$( "#criteriosLotes" ).show(800);
						$( "#criteriosMatPrima" ).hide();
					}
					
				});							
				
				
				
				
			});
				   
		</script> 				
		
    </head>    
    <body onLoad="quitarTabla()">
	<!-- El header es el mismo para todas las paginas-->
		<?php include('header.php'); ?>
        <center>
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
            <nav>
                <div class="button">
                    <table>
						<tr>
							<td>
								<img src="../img/way.png"  alt="Icono" />
							</td>
							<td class="celdaEnlace">
								<a href="AsignarLinea.php" class="enlace">                            
									Asignar Línea de Producción
								</a>
							</td>
						</tr>
					</table>
                </div>     
                <div class="button">
                    <table>
						<tr>
							<td>
								<img src="../img/search.png"  alt="Icono" />
							</td>
							<td class="celdaEnlace">
								<a href="ConsultarDispIngredientes.php" class="enlace">
									Consultar Disponibilidad de Ingredientes
								</a>
							</td>
						</tr>
					</table>
                </div>                      
                <div class="button">
                    <table>
						<tr>
							<td>
								<img src="../img/clock.png"  alt="Icono" />
							</td>
							<td class="celdaEnlace">
								<a href="ConsultarPedidos.php" class="enlace">                            
									Consultar Pedidos en Espera
                                </a>
							</td>
						</tr>
					</table>
                </div>
				<div class="selected-button">
                    <table>
						<tr>
							<td>
								<img src="../img/notepad.png"  alt="Icono" />
							</td>
							<td class="celdaEnlace">
								<a href="CrearReporte.php" class="enlace">                            
									Crear reporte
								</a>                                    
							</td>
						</tr>
					</table>
                </div>                
                <div class="button">
                    <table>
						<tr>
							<td>
								<img src="../img/note.png"  alt="Icono" />
							</td>
							<td class="celdaEnlace">
								<a href="GestionarLotes.php" class="enlace">                            
									Gestionar Lotes
								</a>                                    
							</td>
						</tr>
					</table>
                </div>      
            </nav>
            
			<!-- Divisor del contenido de la pagina -->
            <div id="all-content">	
                <h2>Creación de Reportes de Producción</h2>      
                
				<form id="formReporte" method="POST" action="generarReporte.php">
				<table style="float: left;" >
				<tr>
				<td style="width: 200px;">
				<p class="textoForm">Seleccione el tipo de reporte: </p>                           
				</td>
				<td style="width: 450px; ">
				<select name="tipoReporte" id="selectTipo" class="entrada">                    
					<option value="lotes">Reporte de Lotes</option>                    	
                    <option value="matPrima">Reporte de Materia Prima</option>                 
				 </select>
				 </td>
				 </tr>
				
				<tr>
				<td>
                <p class="textoForm">Ingrese la Fecha Inicial:</p>
				</td>
				<td>
				<input type="text" class="datePicker entrada" id="fechaInicio" name="fechaInicio"/>
				</td>
				</tr>
				
				<tr>
				<td>				
				<p class="textoForm">Ingrese la Fecha Final:</p>
				</td>
				<td>
				<input type="text" class="datePicker entrada" id="fechaFin" name="fechaFin"/>
				</td>
				</tr>
				
				<tr>
				<td>
				<p class="textoForm">Ordenar resultados por: </p>
				</td>
				<td>
				<select name="ordenamiento" id="criteriosLotes" class="entrada">
                    <option value="fecha">Fecha de Producción</option>                    	
                    <option value="linea">Línea de Producción</option>
					<option value="producto">Producto</option>
                </select>
				<select name="ordenamiento" id="criteriosMatPrima" class="entrada">
                    <option value="producto">Proveedor</option>
					<option value="fecha">Materia Prima</option>                    	
                    <option value="linea">Línea de Producción</option>						
                </select>			
				<br/>				
				</td>
				</tr>
				
				<tr>
				<td></td>
				<td>
				<input type="submit" class="botonform" id="botonCrear" value="Generar Reporte"/>
					
				</td>
				</tr>
				</table>
				</form>
				
				<div id="dialog-message" title="Operación exitosa">
					<p>
						<span class="ui-icon ui-icon-circle-check" style="float: left; margin: 0 7px 50px 0;"></span>
							Se ha creado el reporte satisfactoriamente. Oprima el botón Ok para ver el PDF.
					</p>					
				</div>
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>