<!--
	AgregarEmpleado.php
	Última modificación: 11/04/2013
	
	Agrega empleado o los modifica
	
	Recibe: 
		$_GET["id"] : RFC del empleado a modificar ó
					  sin definir cuando se va a agregar uno nuevo
	
	- Documentación del código: OK
-->
<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Empleado</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>    
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
        <nav>
			<div class="selected-button" onclick="redirect('GestionEmpleado.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión Empleados</div>
			<div class="button" onclick="redirect('GestionProducto.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Gestión Productos</div>
			<div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
        </nav>
		<div id="all-content">
                <h2 id="titulo">Agregar Empleado</h2>
				<form id="altaEmpleado" action="AgregaEmp.php"name="altaEmpleado" method ="POST">
				<div id="content">
                    <div class="box">
					<table>						
						<tr>
							<td>CURP: </td>
							<td><input id="curp" name="curp" type="text" placeholder="CURP" onblur="valida(this.value,'msgCURP','curp');"/> </td>
							<td><span id="msgCURP"></span></td>
						</tr>
						<tr>
						   <td>Nombre: </td>
						   <td><input id="nombre" name="nombre" type="text" placeholder="Nombre del Empleado" onblur="valida(this.value,'msgNombre','nombre');"/></td>
						   <td><span id="msgNombre"></span></td>
						</tr>
						<tr>
							<td>Dirección: </td>
							<td><input id="dir" name="dir" type="text" placeholder="Direccion" onblur="valida(this.value,'msgDireccion','direccion');"/></td>
							<td><span id="msgDireccion"></span></td>
						</tr>
						 <tr>
							 <td>Contraseña: </td>
							 <td><input id="pass" name="pass" type="password" placeholder="Contraseña" onblur="valida(this.value,'msgPass2','password');"/> </td>
							 <td><span id="msgPass"></span></td>
						</tr>
						<tr>
							 <td>Confirmar contraseña: </td>
							 <td><input id="pass2" name="pass2" type="password" placeholder="Confirmar contraseña" onblur="valida(this.value,'msgPass2','password');" /> </td>
							 <td><span id="msgPass2"></span></td>
						</tr>
					</table>
					</div>
                    <div class="box">
                            <p>Seleccione el área a la que será asignado el empleado </p>
								Área:<?php include("SelectAreas.php"); ?>
                        </div>
                    <div class="box">
						<div id="buttonOK" class="form-button" onclick="agregarEmpleado();">Agregar</div>
                        <div class="form-button" onclick="redirect('GestionEmpleado.php')">Cancelar</div>	
                    </div>
                </div>
				</form>
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<script type="text/javascript">
	var modify = false;
</script>

<?php
	/*
		Verifica si es la opcion de modificar un empleado, si lo es, agrega los scripts y carga los datos correspondientes
	*/
	if ( isset($_GET["id"]) ){
		$emp = $_GET["id"];
		$encontrado = Empleado::findById($emp);
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
	
		document.getElementById('curp').disabled="disabled";
		document.getElementById('nombre').value = "<?php echo $encontrado->getNombre(); ?>";
		document.getElementById('curp').value = "<?php echo $encontrado->getCurp(); ?>";
		document.getElementById('dir').value = "<?php echo $encontrado->getDireccion(); ?>";
		document.getElementById('pass').value = "<?php echo $encontrado->getContrasena(); ?>";
		document.getElementById('pass2').value = "<?php echo $encontrado->getContrasena(); ?>";
		document.getElementById('titulo').innerHTML = "Editar empleado";
		document.getElementById('buttonOK').innerHTML = "Editar";
		selectItem( <?php echo $encontrado->getArea(); ?> , document.getElementById("area"));
		modify = true;
	</script>
<?php
	}
?>
<!-- Agrega los scripts de la pantalla y el modulo -->
<?php include("scripts.php"); ?>
<script type="text/javascript">
	/* Agrega el empleado a la base de datos */
	function agregarEmpleado(){
		parametros = "nombre=" + document.getElementById('nombre').value + "&";
		parametros+= "curp=" + document.getElementById('curp').value + "&";
		parametros+= "dir=" + document.getElementById('dir').value + "&";
		parametros+= "pass=" + document.getElementById('pass').value + "&";
		parametros+= "pass2=" + document.getElementById('pass2').value + "&";
		parametros+= "area=" + document.getElementById('area').value;
		if ( modify ){
			parametros +="&edit=1";
		}
		parametros = parametros.replace("#","%23");
		sendPetitionQuery("AgregaEmp.php?" + encodeURI(parametros));
		console.log("AgregaEmp.php?" + encodeURI(parametros));
		/* returnedValue almacena el valor que devolvio el archivo PHP */
		if (returnedValue == "OK" ){
			if ( modify ){
				alert("Usuario editado correctamente");
			}else{
				alert("Usuario agregado correctamente");
			}
			window.location = "./GestionEmpleado.php";
		}
		else if ( returnedValue == "DATABASE_PROBLEM"){
			alert("Error en la base de datos");
		}
		else if ( returnedValue == "MISSMATCH_PASSWORD"){
			alert("Las contraseñas no coinciden");
		}
		else if ( returnedValue == "INPUT_PROBLEM"){
			alert("Datos con formato inválido");
		} else {
			alert ("Error desconocido D:");
		}
	}
	
	var passActivo = false; // Verdadero cuando ya se edito el password al menos una vez
	
	function showCURPHelp(){
		alert("Fomato del CURP:\nPosición 1-4: La letra inicial y la primera vocal interna del primer apellido, la letra inicial del segundo apellido y la primera letra del nombre.\nPosición 5-10: La fecha de nacimiento en el orden año, mes y día. Para el año se tomarán los últimos dos digitos, cuando el día sea menor a diez, se antepondrá un cero.\nPosición 11: Sexo M para mujer o H para hombre.\nPosición 12-13: La letra inicial y ultima consonante del nombre de estado de nacimiento.\nPosición 14-16: Integradas por las primeras consonantes internas del primer apellido, segundo apellido y nombre.\nPosición 17: Diferenciador de homonimia. 1-9 para fechas de nacimiento hasta 1999, A-Z para fechas de nacimiento a partir de 2000.\nPosición 18: Digito verificador asignado por la Secretaría de Gobernación.");
	}
	
	function valida( str, target, validate ){
		if ( validate == "nombre" ){
			str = str.trim();
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' />Este campo es obligatorio.";	
			}
			else{
				var re = /^[a-zA-Z áéíóúÁÉÍÓÚ]{3,}$/;
				ok = re.exec(str);
				if ( !ok ){
					document.getElementById(target).innerHTML = "<img src='../img/error.png' />Este campo solo acepta letras y espacios.";	
				}else{
					document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				}
			}
		}
		
		else if ( validate == "curp") {
			str = str.trim();
			if ( !validarCurp(str) ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> CURP no tiene formato correcto. ";	
				document.getElementById(target).innerHTML += "<img src='../img/help.png' onclick='showCURPHelp();' class='clickable'/>";	
			}
			else{
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
			}
			
		}else if ( validate == "direccion" ){
			str = str.trim();
			if ( str.length >= 200 || str.length < 3)
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> Este campo debe tener entre 3 y 200 caracteres.";	
			else
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				
		}else if ( validate == "password"){				
			if ( document.getElementById("pass").value.length < 5 || document.getElementById("pass2").value.length < 5){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> La contraseña debe tener al menos 5 caracteres.";			
			}
			else if (document.getElementById("pass").value != document.getElementById("pass2").value){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' /> Las contraseñas no coinciden.";			
			} else {
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";			
			}
		}
	}
	
</script>