<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Consultar Lote</title>
        <?php
		include('scripts.php');
		?> 
        <!--
        	CONSULTAR LOTE
		-->
        <script type="text/javascript">
		$(function(){
			$('#nolote').autocomplete({
				source: 'ajax_consultarlote.php',
				select: function(event, ui){
					$('#resultados').slideUp('slow', function(){
						$('#resultados').html(
							'<h2>Detalles del Lote</h2>' + 
							'<table id="table-content">' + 
							'<tr class="tr-header">' + 
							'<th>Numero de Lote</th><th>Producto Asociado</th>' +
							'<th>Linea de Produccion</th><th>Fecha de Elaboracion</th>' +
							'<th>Fecha de Caducidad</th>' +
							'</tr>' + 
							'<tr class="tr-cont">' +
							'<td>' + ui.item.value + '</td><td>' + ui.item.producto + '</td>' + 
							'<td>' + ui.item.linea + '</td><td>' + ui.item.elaboracion + '</td>' +
							'<td>' + ui.item.caducidad + '</td>' +
							'</tr>' +
							'</table>'
						);
					});
					$('#resultados').slideDown('fast');
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
				<h2>Consultar Lote</h2>
				<p>Ingresa el Número del Lote:</p>
    			<div id="busqueda">
        			<input type="text" id="nolote" name="nolote"
                    onblur="valida(this.value, 'msgLote', 'nolote')"/>
						<a href="#" id="tooltip">
                        	<img src="../img/help.png" />
                            <span>El autocompletado te ayudara en tu búsqueda.</span>
                        </a>                    
                        
        		</div>              
        		<div id="resultados">
        		</div>                            
            </div><!--all-content-->
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>

<script>
function valida( str, target, validate ){
		if ( validate == "nolote" ){
			//str = str.trim();
			str = str.trim;
			if ( str.length > 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}
		}
}
</script>