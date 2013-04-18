<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Modificar Lote</title>
        <?php
		include('scripts.php');
		?> 
        <!--
        	SCRIPT PARA FECHAS
        -->
		<script type="text/javascript">
		$(function(){
			$('#from').datepicker({changeMonth: true, changeYear: false,
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
				'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 
				'Oct','Nov','Dic'],
      			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			});			
			$('#to').datepicker({changeMonth: true, changeYear: false,
				monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
				'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 
				'Oct','Nov','Dic'],
      			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
      			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
      			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			});			
		});
		</script>    
        <!--
        	SCRIPT MODIFICAR LOTE
		-->     
		<script>
			function modificarLote(){			
				var producto = $('#nombreProducto').val();
				var linea = $('#lineaProduccion').val();
				var from = $('#from').val();
				var to = $('#to').val();
				var id = $('#nolote').val();
				
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
					$('#proceso').html('Modificando Lote . . .<img src="../img/ajax.gif" />');
					$.ajax({
						url: 'ajax_modificarlote.php',
						data: {"id": id,"producto": producto, "linea": linea, "from": from, "to": to},
						success: function(data){
							window.setTimeout(function(){
								$('#modificar').slideUp('fast');
								$('#proceso').html('<h2>El Lote ha sido modificado exitosamente.</h2><br />');
								$('#data').css("display", "inline-table");
								$('#data').html(data);
							}, 2000);
						}
					});//ajax
				}//else
			}
        </script> 
        <!--
        	SCRIPT AUTOCOMPLETADO NOMBRE PRODUCTO
		-->
        <script type="text/javascript">
		$(function(){
			$('#nombreProducto').autocomplete({
				source: 'ajax_autoproducto.php'
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
                <h2>Modificar Lote</h2>
                <?php
					if (isset($_GET["nolote"]) and $_GET["nolote"] <> "" ){
						$nolote = $_GET["nolote"];
						$consulta = "SELECT * FROM Lote WHERE idLote = '$nolote';";
		
						if($paquete = ejecutarConsulta($consulta)){
							$resultado = modificarLote($paquete);
							echo $resultado;
						}
						else{
							echo 'No se encontraron datos para modificar . . .';
						}
					}
					else {
						echo '<p>Debes seleccionar un lote para modificar.</p>';
					}	                
				?>      
            </div><!--all-content-->
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>