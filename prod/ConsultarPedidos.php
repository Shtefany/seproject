<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Modulo de Producción</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
        <script src="../js/jquery-1.9.1.js"></script>
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
    </head>    
    <body>
    	 <?php include("header.php"); ?>

        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('ConsultarIngredientes.php');">
                	<img src="../img/search.png" alt="Icono" class="img-icon" />
                    	Consultar Disponibilidad de Ingredientes
				</div>
                <div class="selected-button" onclick="redirect('ConsultarPedidos.php');">
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
                	Ingresa la fecha de Venta <br />
                    <input type="text" name="fechaVenta" id="fechaVenta" placeholder="Fecha de Venta" />
                </p>
                <button id="FormSubmit1" onClick="consultarPendientes()" class="form-button">
                	Consultar Pedidos
                </button>
                <button id="FormSubmit" class="form-button">
                	Consultar Pedidos
                </button>
                <div id="validar"></div>
                <div id="proceso"></div>
                <div id="resultados1"></div>
                <div id="resultados"></div>
			</div>
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>
