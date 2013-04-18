<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Producción</title>
        <!--
        <link rel="stylesheet" type="text/css" href="../css/estiloproduccion.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.2.custom.css">
        <script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="js/script.js"></script>
        <script src="../js/navigation.js"></script>
        -->
        <?php
		include('scripts.php');
		?>


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
			<!-- Divisor del contenido de la pagina -->
            <div id="all-content">	
                <h2>
					PRODUCCIÓN
				</h2>
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
		