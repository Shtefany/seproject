<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Registrar Lote</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
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
                <div class="selected-button" onclick="redirect('GestionarLotes.php');">
                	<img src="../img/note.png"  alt="Icono" class="img-icon" />
                    	Gestión de Lotes
				</div>                                
            </nav>		
            <div id="all-content">
                <h2 id="titulo">Registrar Lote</h2>
				<form id="altaLote" action="AgregaLote1.php" name="altaLote" method ="POST">
					<div id="content">
                    	<div class="box">
							<table>						
								<tr>
						   			<td>Producto Asociado: </td>
						   			<td>
                                    	<input id="producto" name="producto" type="text" 
                                        placeholder="Nombre del Producto" 
                                        onblur="valida(this.value,'msgProducto','producto');"/>
									</td>
						   			<td><span id="msgProducto"></span></td>
								</tr>                   
								<tr>
									<td>Línea de Producción: </td>
									<td>
                                    <input id="linea" name="linea" type="text" placeholder="#" 
                                    onblur="valida(this.value,'msgLinea','linea');"/> 
                                    </td>
									<td>
                                    	<span id="msgLinea"></span>
									</td>
								</tr>   
								<tr>
									<td>Fecha de Elaboración: </td>
									<td>
                                    <input id="elaboracion" name="elaboracion" type="text" 
                                    placeholder="AAAA-MM-DD" 
                                    onblur="valida(this.value,'msgElaboracion','elaboracion');"/> 
                                    </td>
									<td>
                                    	<span id="msgElaboracion"></span>
									</td>
								</tr>
								<tr>
									<td>Fecha de Caducidad: </td>
									<td>
                                    <input id="caducidad" name="caducidad" type="text" 
                                    placeholder="AAAA-MM-DD" 
                                    onblur="valida(this.value,'msgCaducidad','caducidad');"/> 
                                    </td>
									<td>
                                    	<span id="msgCaducidad"></span>
									</td>
								</tr>                                                   
							</table>
                            <input type="hidden" name="numlote" id="numlote" 
                            value="<?php echo $_GET["nolote"]?>" />
                    		<div class="box">
								<div id="buttonOK" class="form-button" onclick="agregarLote();">
                                	Registrar
								</div>
                        		<div class="form-button" onclick="redirect('GestionarLotes.php')">
                                	Cancelar
								</div>	
                    		</div>                            
						</div><!--box-->
					</div><!--content-->
				</form>
            </div><!--allcontent-->
        </div><!--mainDiv-->
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<script type="text/javascript">
	var modify = false;
</script>
<?php include("scripts.php"); ?>
<?php
	/*
		Verifica si es la opcion de modificar un lote, si lo es, 
		agrega los scripts y carga los datos correspondientes
	*/
	include("clases/Lote.class.php");	
	if ( isset($_GET["nolote"]) ){
		$lote = $_GET["nolote"];
		$encontrado = Lote::findById($lote);
?>
<script type="text/javascript">
	
	function selectItem(val, sel){
		for(var i, j = 0; i = sel.options[j]; j++) {
			if(i.value == val) {
				sel.selectedIndex = j;
				break;
			}
		}
	}
	document.getElementById('producto').value = "<?php echo $encontrado->getProducto(); ?>";
	document.getElementById('linea').value = "<?php echo $encontrado->getLinea(); ?>";
	document.getElementById('elaboracion').value = "<?php echo $encontrado->getElaboracion(); ?>";
	document.getElementById('caducidad').value = "<?php echo $encontrado->getCaducidad(); ?>";
	document.getElementById('titulo').innerHTML = "Modificar Lote";
	document.getElementById('buttonOK').innerHTML = "Modificar";
	modify = true;
</script>
<?php
	}
?>
<!-- Agrega los scripts de la pantalla y el modulo -->
<script type="text/javascript">
	/* Agrega el lote a la base de datos */
	function agregarLote(){
		parametros = "nolote=" + document.getElementById('numlote').value + "&";	
		parametros += "producto=" + document.getElementById('producto').value + "&";
		parametros += "linea=" + document.getElementById('linea').value + "&";
		parametros += "elaboracion=" + document.getElementById('elaboracion').value + "&";
		parametros += "caducidad=" + document.getElementById('caducidad').value;		
		

		if ( modify ){
			parametros +="&edit=1";
		}
		parametros = parametros.replace("#", "%23");
		sendPetitionQuery("AgregaLote1.php?" + encodeURI(parametros));
		console.log("AgregaLote1.php?" + encodeURI(parametros));
		//alert("AgregaLote1.php?" + encodeURI(parametros));
		/* returnedValue almacena el valor que devolvio el archivo PHP */
		if (returnedValue == "OK" ){
			if ( modify ){
				alert("Lote modificado correctamente");
			}else{
				alert("Lote registrado correctamente");
			}
			window.location = "./GestionarLotes.php";
		}
		else if ( returnedValue == "DATABASE_PROBLEM"){
			alert("Error en la base de datos");
		}
		else if ( returnedValue == "INPUT_PROBLEM"){
			alert("Datos con formato inválido");
		} else {
			alert ("Error desconocido D:");
		}
	}
	
	function valida( str, target, validate ){
		if ( validate == "producto" ){
			str = str.trim();
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' />" + 
				"Este campo es obligatorio.";	
			}
			else{
				var re = /^[a-zA-Z áéíóúÁÉÍÓÚ]{3,}$/;
				ok = re.exec(str);
				if ( !ok ){
					document.getElementById(target).innerHTML = "<img src='../img/error.png' />" + 
					"Este campo solo acepta letras y espacios.";	
				}else{
					document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				}
			}
		}//producto
		else if ( validate == "linea") {
			str = str.trim();
			//alert("Valor del str: " + str);
			if ( str == 0 || str > 3){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' />" + 
				"La línea no es valida!";	
			}
			else{
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}		
		}
	}
	
</script>