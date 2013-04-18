<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gestionar Lotes</title>
        <?php
		include('scripts.php');
		?>         

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
                <h2>Gestionar Lotes</h2>
				<table id="table-content">
					<tr class="tr-header">
						<td>Número de Lote</td>
						<td>Nombre del Producto Asociado</td>
						<td>Línea de Producción</td>                               
						<td>Fecha de Elaboración</td>
                        <td colspan="2" style="text-align: center">Opciones</td>                         
					</tr>   
					<?php echo generarTablaLotes(); ?>                          
				</table>                    
                <br />   
				<a href="RegistrarLote.php" class="form-button" id="tooltip">
					Registrar Lote
					<span>
						Haz click sobre el botón para registar el lote.
                	</span>                                
				</a>
                <a href="ConsultarLote.php" class="form-button" id="tooltip">
					Consultar Lote
					<span>
						Haz click sobre el botón para consultar la información del lote.
                	</span>                            
				</a>
            </div><!--all-content-->
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>