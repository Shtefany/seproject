<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Registrar Cliente</title>
        <link rel="stylesheet" type="text/css" href="../css/ventastyle/registrarcliente.css">
        <?php include('scripts.php');?> 
    </head>    
    <body>
	 <?php include('header.php');?>   
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
            <?php include('Menu.php');?> 
			<!-- Divisor del contenido de la pagina -->
            <div id="all-content">
				<br/>
                <!--<div id="ENTRADA"><center>Bienvenido al <br/> Modulo de Ventas</center></div>-->
                <center>
              <div id="Formulario">
                 <form name="Rvalida">
                <div id="cab" class="titulo">REGISTRAR CLIENTE</div>
                <div id="tip" class="texto1">Todos los campos son obligatorios.</div>
                <table>
				<tr>
				<td><div id="dvrfc" class="divform">RFC:</div></td>
				<td><input type="text" id="RFC" class="tb" name="RFC" maxlength="13" placeholder="RFC" onblur="valida(this.value,'mrfc','RFC');"/></td>
				<td><span id="mrfc"></span></td>
				</tr>
				<tr>
				<td><div id="dvnom" class="divform">Nombre:</div></td>
				<td><input type="text" id="nom" class="tb" name="nom" placeholder="Nombre Cliente" onblur="valida(this.value,'mnom','nombre');"/></td>
				<td><span id="mnom"></span></td>
				</tr>
				<tr>
				<td><div id="dvtel" class="divform">Tel&eacute;fono Fijo:</div></td>
				<td><input type="text" id="tel" class="tb" name="tel" maxlength="11" placeholder="Teléfono" onblur="valida(this.value,'mtel','telefono');"/></td>
				<td><span id="mtel"></span></td>
				</tr>
				<td><div id="dvema" class="divform">E-mail:</div></td>
				<td><input type="text" id="ema" class="tb" name="ema" placeholder="E-mail" onblur="valida(this.value,'mema','email');"/></td>
				<td><span id="mema"></span></td>
				</tr>
				<tr>
				<td><div id="dvdir" class="divform">Direcci&oacute;n:</div></td>
				<td><textarea id="dir" class="ta" name="dir" rows="10" cols="10" placeholder="Dirección" onblur="valida(this.value,'mdir','direccion');"></textarea></td>
				<td><span id="mdir"></span></td>
				</tr>
				
				</table>
                <!--<div id="dvtel" class="divform">Tel&eacute;fono:<input type="text" id="tel" class="tb" name="tel" placeholder="Teléfono"/></div>
                <div id="dvema" class="divform">E-mail:<input type="text" id="ema" class="tb" name="ema" placeholder="E-mail"/></div>
                <div id="dvdir" class="divform">Direcci&oacute;n:</br><textarea id="dir" class="ta" name="dir" rows="10" cols="10" placeholder="Dirección"></textarea></div>-->
                <div id="acept" class="divform" onClick="agregarCliente();"><center>ACEPTAR</center></div>
				<div id="cancel" class="divform" onClick="window.location ='Gestionc.php'"><center>CANCELAR</center></div>
				
                </form>
                </div>
                 </center>
            </div>  
  
    </body>   
</html>
<script type="text/javascript">
	var modify = false;
</script>
<?php
	/*
		Verifica si es la opcion de modificar un empleado, si lo es, agrega los scripts y carga los datos correspondientes
	*/
	include("../php/Cliente.class.php");

	if (isset($_GET["id"]) ){
		$clie = $_GET["id"];
		$encontrado = Cliente::findById($clie);
?>
	<script type="text/javascript">
	
		function selectItem(val,sel){
			for(var i, j = 0; i = sel.options[j]; j++) {
				if(i.value == val) {
					sel.selectedIndex = j;
					break;
				}
			}
		}
		document.getElementById('acept').innerHTML = "EDITAR";
		document.getElementById('RFC').disabled="disabled";
		document.getElementById('nom').value = "<?php echo $encontrado->getNombre(); ?>";
		document.getElementById('RFC').value = "<?php echo $encontrado->getRFC(); ?>";
		document.getElementById('tel').value = "<?php echo $encontrado->getTelefono(); ?>";
		document.getElementById('ema').value = "<?php echo $encontrado->getEmail(); ?>";
		document.getElementById('dir').value = "<?php echo $encontrado->getDireccion(); ?>";
		document.getElementById('cab').innerHTML = "Modificar Cliente";
		modify=true;		
	</script>
<?php
	}
?>
<script type="text/javascript">
	/* Agrega el empleado a la base de datos */
	function agregarCliente(){
		parametros = "nombre=" + document.getElementById('nom').value + "&";
		parametros+= "RFC=" + document.getElementById('RFC').value + "&";
		parametros+= "direccion=" + document.getElementById('dir').value + "&";
		parametros+= "telefono=" + document.getElementById('tel').value + "&";
		parametros+= "email=" + document.getElementById('ema').value + "&";
		if ( modify ){
			parametros +="&edit=1";
		}
		parametros = parametros.replace("#","%23");
		
		sendPetitionQuery("AgregaClie.php?" + encodeURI(parametros));
		
		console.log("AgregaClie.php?" + encodeURI(parametros));
		/* returnedValue almacena el valor que devolvio el archivo PHP */
		if (returnedValue == "OK" ){
			if ( modify ){
				alert("Cliente editado correctamente");
			}else{
				alert("Cliente agregado correctamente");
			}
			window.location = "./GestionC.php";
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
	
	/*function showCURPHelp(){
		alert("Fomato del CURP:\nPosición 1-4: La letra inicial y la primera vocal interna del primer apellido, la letra inicial del segundo apellido y la primera letra del nombre.\nPosición 5-10: La fecha de nacimiento en el orden año, mes y día. Para el año se tomarán los últimos dos digitos, cuando el día sea menor a diez, se antepondrá un cero.\nPosición 11: Sexo M para mujer o H para hombre.\nPosición 12-13: La letra inicial y ultima consonante del nombre de estado de nacimiento.\nPosición 14-16: Integradas por las primeras consonantes internas del primer apellido, segundo apellido y nombre.\nPosición 17: Diferenciador de homonimia. 1-9 para fechas de nacimiento hasta 1999, A-Z para fechas de nacimiento a partir de 2000.\nPosición 18: Digito verificador asignado por la Secretaría de Gobernación.");
	}*/
	
	function valida( str, target, validate ){
		if ( validate == "nombre" ){
			str = str.trim();
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' title='Este campo es obligatorio.'/>";	
			}
			else{
				var re = /^[a-zA-Z áéíóúÁÉÍÓÚ]{3,}$/;
				ok = re.exec(str);
				if ( !ok ){
					document.getElementById(target).innerHTML = "<img src='../img/error.png' title='Este campo solo acepta letras y espacios.'/>";	
				}else{
					document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				}
			}
		}
		else if ( validate == "email"){			
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' title='Este campo es obligatorio.'/>";	
			}
			else{
			if ( !validarEma(str)){
				 document.getElementById(target).innerHTML = "<img src='../img/error.png' title='Email incorrecto'/> ";			
			}
			 else {
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";			
			}}
		}
		else if ( validate == "RFC") {
			str = str.trim();
			if ( !validarRFC(str) ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' title='RFC no tiene formato correcto.'/> ";	
				//document.getElementById(target).innerHTML += "<img src='../img/help.png' onclick='showCURPHelp();' class='clickable'/>";	
			}
			else{
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}
			
		}else if ( validate == "direccion" ){
			str = str.trim();
			if ( str.length >= 200 || str.length < 3)
				document.getElementById(target).innerHTML = "<img src='../img/error.png' title='Este campo debe tener entre 3 y 200 caracteres.'/> ";	
			else
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
		}else if ( validate == "telefono"){			
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' title='Este campo es obligatorio.'/>";	
			}
			else{
				
			if ( !validarTel(str)){
				 document.getElementById(target).innerHTML = "<img src='../img/error.png' title='Numero Telefonico Incorrecto'/> ";			
			}
			 else {
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";}
			}
		}		
	}
	
</script>
