<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Consultar Pedidos en Espera</title>
        <?php
		include('scripts.php');
		?>  
		<!--
        HIDE Y SHOW
     	-->
		<script>
		$(function(){
			$('#fventap').hide();
			$('#FormSubmit').hide();
			$('#resultados1').hide();
			$('#resultados').hide();			
			$("#tipopedido").change(function(){
				if($("#tipopedido").val() == 0 || $("#tipopedido").val() == 1){
					$('#resultados1').hide();
					$('#resultados').hide();					
					$('#FormSubmit1').show(800);					
					$('#FormSubmit').hide();					
					$('#fventap').hide();
				}
				if($("#tipopedido").val() == 2){
					$('#resultados1').hide();
					$('#fventap').show(800);					
					$('#resultados').show(800);
					$('#FormSubmit1').hide();					
					$('#FormSubmit').show(800);
					
				}				
			});
		});
        </script>  
		<!--
        ESTABLECER FECHA DE CALENDARIO
		-->
		<script type="text/javascript">
		$(function () {
    		var now = new Date();
    		var month = (now.getMonth() + 1);               
    		var day = (now.getDate() - 1);
    		if(month < 10) 
        		month = "0" + month;
    		if(day < 10) 
        		day = "0" + day;
    		var today = now.getFullYear() + '-' + month + '-' + day;			
			
			$('#fechaVenta').datepicker({changeMonth: true, changeYear: false,
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
				'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 
				'Oct','Nov','Dic'],
      			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			});
			$('#fechaVenta').datepicker("option", "dateFormat", "yy-mm-dd");
			$('#fechaVenta').datepicker("option", "maxDate", today);
		});
		</script> 
		<!--
        CONSULTA POR FECHA CON AJAX
        -->   
		<script type="text/javascript">
		$(document).ready(function() {				
			//##### send add record Ajax request to response.php #########
			$("#FormSubmit").click(function (e) {
				e.preventDefault();
				if($("#fechaVenta").val() === ''){
					alert("Please enter the date!");
					return false;
				}
		 		var myData = 'fecha='+ $("#fechaVenta").val(); //build a post data structure
				jQuery.ajax({
					type: "POST", // HTTP method POST or GET
					url: "ajax_fecha.php", //Where to make Ajax calls
					dataType:"text", // Data type, HTML, json etc.
					data:myData, //Form variables
					success:function(response){
						$("#resultados").html('');
						$("#resultados").append(response);
						$("#fechaVenta").val(''); //empty text field on successful
					},
					error:function (xhr, ajaxOptions, thrownError){
						alert(thrownError);
					}
				});
			});
		});
		</script>   
        <script>
		<?php include('Funciones.php'); ?>
		function consultarPendientes(){
			$('#resultados1').html("<?php echo obtenerPendientes(); ?>");
			$('#resultados1').show(800);
		}
        </script>                     
    </head>    
    <body>
	<!-- El header es el mismo para todas las paginas-->
		<?php include('header.php'); ?>
        <center>
        <div id="mainDiv">
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
                <div class="selected-button">
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

            
			<!-- Divisor del contenido de la pagina -->
            <div id="all-content">	
				<h2>Consultar Pedidos en Espera</h2>            
				<p>
                	Selecciona un parámetro de búsqueda
				</p>
                <p>
					<select name="parampedido" id="tipopedido">
                    	<option value="1" >Pedidos Pendientes</option>
                    	<option value="2">Pedidos para Cambio</option>                        
					</select>                
				</p>
                <p id="fventap">
            		Ingresa la fecha de Venta<br />
            		<input type="text" name="fechaVenta" id="fechaVenta" placeholder="Fecha de Venta" />
				</p>
				<button id="FormSubmit1" onClick="consultarPendientes()"  class="botonform">
                	Consultar Pedidos
				</button>                
				<button id="FormSubmit" class="botonform">
                	Consultar Pedidos
                </button>
                <div id="validar"></div>  
				<div id="proceso">         
                </div>             
				<div id="resultados1">
                </div>                             
				<div id="resultados">
                </div>            
            </div><!--all-content-->
			
        </div><!--mainDiv-->
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>