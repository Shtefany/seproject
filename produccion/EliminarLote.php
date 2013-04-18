<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Eliminar Lote</title>
		<?php include("scripts.php"); ?>                                          
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
                <h2>Eliminar Lote</h2>
                <?php
					if ( isset($_GET["nolote"]) and $_GET["nolote"] <> "" ){
						$codigo = $_GET["nolote"];                
						eliminarLote($codigo);
					}
					else{
						echo '<p>Debes elegir un lote</p>';
					}
				?>            
            </div><!--all-content-->
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
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
		</script> 