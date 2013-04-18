<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Consultar Disponibilidad de Ingredientes</title>
        <?php
		include('scripts.php');
		?>
        <!--
        	SCRIPT PARA MOSTRAR Y OCULTAR CONTENIDO
        -->    
        <script>
		$(function(){
			$("#xbusp").hide();
			$("#xbusi").hide();
			$('#busqueda').hide();
			$('#pbusqueda').hide();			

			$("#r1").click(function(){
				$("#xingp").show(800);
				$("#xings").show(800);				
				$("#xbusp").hide();
				$("#xbusi").hide();
				$("#validarIngrediente").hide();
				$('#botoncentro').show(800);	
				$('#busqueda').hide();
				$('#pbusqueda').hide();				
			});

			$("#r2").click(function(){
				$("#xingp").hide();
				$("#xings").hide();				
				$("#xbusp").show(800);
				$("#xbusi").show(800);
				$('#botoncentro').hide();				
				$('#busqueda').show(800);
				$('#pbusqueda').show(800);				
				$('#r1').attr('disabled', 'disabled');
			});			

		});		
        </script>
        <!--
        	FUNCION PARA CONSULTAR DISPONIBILIDAD
		-->    
        <script>
			function consultarDisponibilidad(){
				//alert("algo");
				var iding = $('#xings').val();
				if(iding == '0'){
					$('#validarIngrediente').html('<p>Debes seleccionar un ingrediente</p>');
					$('#validarIngrediente').addClass('error');
					return ;
				}									
				else{
					$('#proceso').html('Consultando Disponibilidad . . .<img src="../img/ajax.gif" />');
					$.ajax({
						url: 'ajax_consultando.php',
						data: {"iding": iding},
						success: function(data){
							window.setTimeout(function(){
								$('#mostrar').slideUp('fast');
								$('#proceso').html('<h2>Detalles del Ingrediente.</h2><br />');
								$('#data').css("display", "inline-table");
								$('#data').html(data);
							}, 2000);
						}
					});//ajax
				}//else
			}				
        </script>  
        <!--
        	BUSQUEDA DE INGREDIENTES
		-->
        <script type="text/javascript">
		$(function(){
			$('#buscar').autocomplete({
				source: 'ajax_bingrediente.php',
				select: function(event, ui){;
					$('#resultados').slideUp('slow', function(){
						$('#resultados').html(
							'<h2>Detalles del Ingrediente</h2><br />' + 
							'<table id="table-content">' + 
							'<tr class="tr-header">' + 
							'<th>Identificador del Ingrediente</th><th>Nombre del Ingrediente</th>' +
							'<th>Cantidad Disponible</th><th>Nombre del Proveedor</th>' +
							'</tr>' + 
							'<tr class="tr-cont">' +
							'<td>' + ui.item.id + '</td><td>' + ui.item.value + '</td>' + 
							'<td>' + ui.item.disp + '</td><td>' + ui.item.proveedor + '</td>' +
							'</tr>' +
							'</table>'
						);
					});
					$('#resultados').slideDown('slow');
				}
			});
		});
        </script>   
    </head>    
    
    <body>
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
                <div class="selected-button">
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
				<div class="button">
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
			<?php include('Funciones.php'); ?>
			<!-- Divisor del contenido de la pagina -->
            <div id="all-content">	
				<div id="mostrar"> 
                	<h2>Consultar Disponibilidad de Ingredientes</h2>                
					<p>
    	           		Selecciona el tipo de Consulta
					</p>
                    <p>
	  					<label>
							<input type="radio" name="RadioGroup1" value="ing" id="r1" checked="true">
    						Por Ingrediente
						</label>
					</p>
                    <div id="validarIngrediente"></div>
                    <p>
  						<label>
    						<input type="radio" name="RadioGroup1" value="bus" id="r2">
    						Búsqueda
						</label>
					</p>
                   	<p id="xingp">
                    	Selecciona el ingrediente
                    </p>
					<p>
						<select id="xings" name="xings">
							<option value="0">seleccionar ingrediente. . . </option>
                    		<? echo obtenerIngredientes(); ?>     
						</select>
                    </p>
                    <p id="pbusqueda">Ingresa el nombre del ingrediente.</p>
					<div id="busqueda">
        				<input type="text" id="buscar" name="buscar" />
						<a href="#" id="tooltip">
                        	<img src="../img/help.png" />
                            <span>El autocompletado te ayudara en tu búsqueda.</span>
                        </a>
					</div>
					<div id="resultados">
					</div>
                    <p id="contenidodinamico">
                    </p>
                    
                    <center id='botoncentro'>
	                   	<button type="button" class="botonform" 
                       	onClick="consultarDisponibilidad();" id="tooltip">
                       		Consultar Disponibilidad
		               		<span>
								Haz click sobre el botón para consultar la disponibilidad 
                                   de los ingredientes.
                			</span>                                    
						</button>                                           
					</center>
				</div><!--Mostrar-->
				<div id="proceso">         
                </div>            
				<table id="data" style="display:none;">
                </table>     
            </div><!--all-content-->
			
        </div><!--mainDiv-->
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>