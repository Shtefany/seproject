<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Asignar Línea de Producción</title>
        <?php
		include('scripts.php');
		?> 
        <!--
        	SCRIPT PARA LA FECHA
		-->           
		<script type="text/javascript">
		$(function () {
    		var now = new Date();
    		var month = (now.getMonth() + 1);               
    		var day = (now.getDate() + 1);
    		if(month < 10) 
        		month = "0" + month;
    		if(day < 10) 
        		day = "0" + day;
    		var today = now.getFullYear() + '-' + month + '-' + day;			
			
			var nextmonth = (now.getMonth() + 2);
			var nextday = now.getDate();
    		if(nextmonth < 10) 
        		nextmonth = "0" + nextmonth;
    		if(nextday < 10) 
        		nextday = "0" + nextday;			
			var limite = now.getFullYear() + '-' + nextmonth + '-' + nextday;
			
			$('#fechaProduccion').datepicker({changeMonth: true, changeYear: false,
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
				'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 
				'Oct','Nov','Dic'],
      			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			});
			$('#fechaProduccion').datepicker("option", "dateFormat", "yy-mm-dd");
			$('#fechaProduccion').datepicker("option", "minDate", today);		
			$('#fechaProduccion').datepicker("option", "maxDate", limite);					
		});
		</script>  
        <!--
        	SCRIPT PARA CARGAR EMPLEADOS
		-->                
        <script>
		function cambiarLinea(linea, encargado){
			jQuery(function($){
				$(encargado).attr('disabled', 'disabled');
				$(encargado).addClass('loading');
				$.ajax({
					url: 'ajax_encargados.php',
					data: {"idlinea": $(linea + ' option:selected').attr('value')},
					success: function(data){
						window.setTimeout(function(){
							$(encargado).removeAttr('disabled');
							$(encargado).removeClass('loading');
							$(encargado).html('');
							$(encargado).html(data);
						}, 500);
					}
				});
			});
		}		
        </script>   
        <!--
        	SCRIPT PARA ASIGNAR LINEA DE PRODUCCION
		-->           
		<script>
			function asignarLinea(){			
				var fecha = $('#fechaProduccion').val();
				var linea = $('#linea').val();
				var encargado = $('#encargado').val();				
				var producto = $('#producto').val();
				var cantidad = $('#cantidad').val();

				
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
					$('#proceso').html('Asignando Línea . . .<img src="img/ajax.gif" />');
					$.ajax({
						url: 'ajax_asignando.php',
						//$(linea + ' option:selected').attr('value')
						data: {"fecha": fecha, "linea": linea, "encargado": encargado, 
						"producto": producto, "cantidad": cantidad},
						success: function(data){
							window.setTimeout(function(){
								$('#asignar').slideUp('fast');
								$('#proceso').html('<h2>La línea de producción fue asignada correctamente.</h2><br />');
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
                <div class="selected-button">
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
            	<div id="asignar" >
                <h2>Asignar Línea de Producción</h2>
					<p>
                		Selecciona la fecha de Producción
                	</p>
                	<p>
						<input type="text" id="fechaProduccion" name="fechaProduccion" 
                        placeholder="Fecha de Producción" 
                        onblur="valida(this.value,'msgFecha','fechaProduccion');"/>
                	</p>
                    <p id="msgFecha"></p>
                	<p>
                		Selecciona la línea de producción asociada
                	</p>                
                    <p>
                    	<select name="linea" id="linea" 
                        onchange="javascript:cambiarLinea('#linea', '#encargado');"
                        onblur="valida(this.value,'msgLinea','linea');">                    
                    		<option value="0">Seleccionar Línea</option>
							<?php echo obtenerLineas(); ?>                        
                    	</select>     
					</p>
                    <p id="msgLinea"></p>
                	<div id="validarLinea"></div>  
                	<p>
                		Selecciona el encargado de producción
                	</p>
                    <p>
                    	<select name="encargado" id="encargado" disabled="disabled">                    
                    		<option value="0">Seleccionar encargado</option>
                    	</select>                                        
					</p>
                	<p>
                		Selecciona el producto asociado
                	</p>
                    <p>
                    	<select name="producto" id="producto" 
                        onblur="valida(this.value,'msgProducto','producto');">                    
                    		<option value="0">Seleccionar Producto</option>
                            <?php echo obtenerProductos(); ?>
                    	</select>                                                            
					</p>
                    <p id="msgProducto"></p>
                	<p>
                		Selecciona la cantidad de producto
                	</p>
                    <p>                           
                    	<select name="cantidad" id="cantidad"
                        onblur="valida(this.value,'msgCantidad','cantidad');">                    
                    		<option value="0">Seleccionar Cantidad</option>
							<option value="1">50 Unidades</option>
							<option value="2">100 Unidades</option>
							<option value="3">200 Unidades</option>
							<option value="4">300 Unidades</option>
							<option value="5">500 Unidades</option> 
                    	</select>         
					</p>  
                    <p id="msgCantidad"></p>                    
                    <center id="botoncentro">
	                    <button type="button" class="botonform" onClick="asignarLinea()" id="tooltip">
							Asignar Línea de Producción    
                            <span>
                            	Haz click en el boton para asignar <br />la línea de producción.
                            </span>            
     	               </button>             
					</center>                                      
				</div>
                <div id="proceso">         
                </div>            
				<table id="data" style="display:none;">
                </table>                      
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<script>
	function valida( str, target, validate ){
		if ( validate == "fechaProduccion" ){
			//str = str.trim();
			str = str.trim;
			if ( str.length != 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}
		}
		else if(validate == "linea"){
			str = str.trim();
			if(str == '0'){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> Debes elegir una línea.";
			}
			else{
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}
		}
		else if(validate == "producto"){
			str = str.trim();
			if(str == '0'){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> Debes elegir un  producto.";
			}
			else{
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}
		}
		else if(validate == "cantidad"){
			str = str.trim();
			if(str == '0'){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> Debes elegir una cantidad de producto.";
			}
			else{
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}
		}				
	}
/*		
		else if ( validate == "curp") {
			str = str.trim();
			if ( !validarCurp(str) ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> CURP no tiene formato correcto. ";	
				document.getElementById(target).innerHTML += "<img src='../img/help.png' onclick='showCURPHelp();' class='clickable'/>";	
			}
			else{
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}
			
		}else if ( validate == "direccion" ){
			str = str.trim();
			if ( str.length >= 200 || str.length < 3)
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> Este campo debe tener entre 3 y 200 caracteres.";	
			else
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				
		}else if ( validate == "password"){				
			if ( document.getElementById("pass").value.length < 5 || document.getElementById("pass2").value.length < 5){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> La contraseña debe tener al menos 5 caracteres.";			
			}
			else if (document.getElementById("pass").value != document.getElementById("pass2").value){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> Las contraseñas no coinciden.";			
			} else {
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";			
			}
		}
	}
	*/
</script>
