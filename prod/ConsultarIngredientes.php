<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Modulo de Producción</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
		<script type="text/javascript" src="../js/jquery-1.9.1.js" ></script>
        <style>
		#tooltip:hover{
			text-decoration: none;
		}
		#tooltip span{
			display: none;
			margin: 0 0 0 10px;
			padding: 5px 5px;
		}
		#tooltip:hover span{
			display: inline;
			position: absolute;
			border: 1px solid #ccc;
			background: #fff;
			color: #666;
			font-size: 0.7em;
		}		
        </style>
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
    </head>    
    <body>
    	 <?php include("header.php"); ?>

        <center>
        <div id="mainDiv">
            <nav>
                <div class="selected-button" onclick="redirect('ConsultarIngredientes.php');">
                	<img src="../img/search.png" alt="Icono" class="img-icon" />
                    	Consultar Disponibilidad de Ingredientes
				</div>
                <div class="button" onclick="redirect('ConsultarPedidos.php');">
                	<img src="../img/clock.png"  alt="Icono" class="img-icon" />
                    	Consultar Pedidos en Espera
				</div>
                <div class="button" onclick="redirect('CrearReporte.php');">
                	<img src="../img/notepad.png"  alt="Icono" class="img-icon" />
                    	Crear Reporte
				</div>
                <div class="button" onclick="redirect('GestionarLineas.php');">
                	<img src="../img/way.png"  alt="Icono" class="img-icon" />
                    	Gestión de Líneas
				</div>                
                <div class="button" onclick="redirect('GestionarLotes.php');">
                	<img src="../img/note.png"  alt="Icono" class="img-icon" />
                    	Gestión de Lotes
				</div>                                
            </nav>
            <div id="all-content">		
            	<div id="mostrar">
                	<h2>Consultar Disponibilidad de Ingredientes</h2>                
                    <p>
                    	Selecciona el tipo de Consulta
                    </p>
                    <p>
                    	<label>
                        	<input type="radio" name="RadioGroup1" value="ing" id="r1" checked="true" />
                            Por Ingrediente
						</label>
					</p>
					<div id="validarIngrediente"></div>
                    <p>
                    	<label>
                        	<input type="radio" name="RadioGroup1" value="bus" id="r2" />
                            Búsqueda
						</label>
                    </p>
                    <p id="xingp">
                    	Selecciona el ingrediente
                    </p>
                    <p>
                    	<select id="xings" name="xings">
                        	<option value="0">seleccionar ingrediente. . .</option>
                            <?php //echo obtenerIngredientes(); ?>
                        </select>
                    </p>
                    <p id="pbusqueda">
                    	Ingresa el nombre del ingrediente.
                    </p>
                    <div id="busqueda">
                    	<input type="text" id="buscar" name="buscar" />
                        <a href="#" id="tooltip">
                        	<img src="../img/help.png" />
                            <span>El autocompletado te ayudará en tu búsqueda.</span>
                        </a>
                    </div><!--busqueda-->
                    <div id="resultados"></div>
                    <p id="contenidodinamico"></p>
                    <center id="botoncentro">
                    	<button type="button" class="form-button" 
                        onClick="consultarDisponibilidad();" id="tooltip">
                        	Consultar Disponibilidad
                            <span>
                            	Haz click sobre el botón para consultar la disponibilidad del 
                                ingrediente.
                            </span>
                        </button>
                    </center>
                </div><!--mostrar-->
                <div id="proceso"></div>
                <table id="data" style="display:none;" ></table>
			</div><!--all-content-->
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>