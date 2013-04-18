<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Registrar Lote</title>
        <?php
		include('scripts.php');
		?> 
        <!--
        	SCRIPT PARA LAS FECHAS
		-->           
		<script type="text/javascript">
		$(function () {
    		var now = new Date();
    		var month = (now.getMonth() + 1);               
    		var day = (now.getDate());
    		if(month < 10) 
        		month = "0" + month;
    		if(day < 10) 
        		day = "0" + day;
    		var today = now.getFullYear() + '-' + month + '-' + day;			
			
			$('#from').datepicker({changeMonth: true, changeYear: false,
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
				'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 
				'Oct','Nov','Dic'],
      			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			});
			$('#from').datepicker("option", "dateFormat", "yy-mm-dd");
			$('#from').datepicker("option", "maxDate", today);					
			//FECHA DE CADUCIDAD
    		var now1 = new Date();
    		var month1 = (now1.getMonth() + 1);               
    		var day1 = (now1.getDate() + 7);
    		if(month1 < 10) 
        		month1 = "0" + month1;
    		if(day1 < 10) 
        		day1 = "0" + day1;
    		var today1 = now1.getFullYear() + '-' + month + '-' + day1;						
    		var today2 = (now1.getFullYear() + 2) + '-' + month1 + '-' + day1;									
			$('#to').datepicker({changeMonth: true, changeYear: true,
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
				'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 
				'Oct','Nov','Dic'],
      			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			});
			$('#to').datepicker("option", "dateFormat", "yy-mm-dd");
			$('#to').datepicker("option", "minDate", today1);						
			$('#to').datepicker("option", "maxDate", today2);									
		});
		</script>       
		<script>
			function registrarLote(){			
				var producto = $('#producto').val();
				var linea = $('#linea').val();
				var from = $('#from').val();
				var to = $('#to').val();
				
				if(producto == '0'){
					$('#validarProducto').html('<p>Debes seleccionar un producto</p>');
					$('#validarProducto').addClass('error');
					return;
				}		
				if(linea == '0'){
					$('#validarLinea').html('<p>Debes seleccionar una línea</p>');
					$('#validarLinea').addClass('error');
					return;
				}											
				else{
					$('#proceso').html('Registrando Lote . . .<img src="../img/ajax.gif" />');
					$.ajax({
						url: 'ajax_registrarlote.php',
						data: {"producto": producto, "linea": linea, "from": from, "to": to},
						success: function(data){
							window.setTimeout(function(){
								$('#registrar').slideUp('fast');
								$('#proceso').html('<h2>El Lote ha sido registrado exitosamente.</h2><br />');
								$('#data').css("display", "inline-table");
								$('#data').html(data);
							}, 2000);
						}
					});//ajax
				}//else
			}
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
                <div class="selected-button">
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
            <div id="registrar">
                <h2>Registrar Lote</h2>
               	<p>
					Selecciona el producto asociado
				</p>
                <p>
                	<select name="producto" id="producto">    
                		<option value="0">Seleccionar producto</option>
						<?php
							echo obtenerProductos();
						?>                                                
					</select> 
				</p>
                <div id="validarProducto"></div>                    
				<p>
                	Selecciona la línea de producción asociada
				</p> 
                <p>
				<select name="linea" id="linea">                    
                	<option value="0">Seleccionar Línea</option>	
                    <?php 
						echo obtenerLineas()
					?>           
				</select> 
                </p>
				<div id="validarLinea"></div>                                                                 
				<p>
                	Selecciona la fecha de elaboración
				</p>
                <p>
					<input type="text" id="from" name="from" placeholder="Fecha de elaboración"/>
				</p>
				<p>
					Selecciona la fecha de caducidad
				</p>
                <p>
					<input type="text" id="to" name="to" placeholder="Fecha de Caducidad"/>
				</p>
                <center id="botoncentro">
                	<button type="button" class="botonform" onClick="registrarLote()">
						Registar Lote
					</button>
				</center> 
                </div>
                <div id="proceso">         
                </div>            
				<table id="data" style="display:none;">
                </table>        
            </div><!--all-content-->
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>