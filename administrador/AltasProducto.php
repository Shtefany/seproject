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
        <title>Producto</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>  
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('GestionEmpleado.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión Empleados</div>
                <div class="button" onclick="redirect('GestionProducto.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Gestión Productos</div>
               	<div class="button" onclick="redirect('GestionReceta.php');"><img src="../img/note.png"  alt="Icono" class="img-icon" />Gestión Recetas</div>
   				<div class="button" onclick="redirect('Reportes.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Solicitar Reporte</div>
            </nav>
            <div id="all-content">
				<h2 id="titulo">Agregar Producto</h2>
				<form id="altaProducto" action="AgregaProd.php"name="altaProducto" method ="POST">
				<input id="idProducto" name="idProducto" type="hidden"/>
				<div id="content">
                    <div class="box">
					<table>						
						<tr>
						   <td>Nombre: </td>
						   <td><input id="nombreP" name="nombreP" type="text" placeholder="Nombre del Producto" onblur="valida(this.value,'msgNombre','nombre');"/></td>
						   <td><span id="msgNombre"></span></td>
						</tr>
						<tr>
							<td>Precio: </td>
							<td><input id="precioP" name="precioP" type="text" placeholder="Precio" onblur="valida(this.value,'msgPrecio','precio');"/></td>
							<td><span id="msgPrecio"></span></td>
						</tr>
						
					</table>
					</div>
					<div id="recetaTitle" class="box">
						<h2>Asignar Receta</h2>
                         <p>Seleccione el ingrediente para agregar a la receta </p>
								<table>
										<tr>
										<td>Ingrediente</td>
										<td><?php include("SelectIngrediente.php"); ?></td>
										<td><img src='../img/ok.png'   onclick='AddMP()' alt='Agregar' class='clickable'/></td>
										</tr>
								</table>
								
                    </div>
					 <div id="recetaTable" class="box">
				
						<table id="table-aux">
							<tbody id="cuerpoT" name="cuerpoT">
										<tr id="titulosTr" class="tr-header">
										<td>Ingrediente</td>
										<td>Unidad</td>
										<td>Cantidad necesaria</td>
										<td> </td>
										<td> </td>
										</tr>
							</tbody>
						</table>
				
					</div> 
					<div class="box">
                        <div id="buttonOK" class="form-button" onClick="agregarProducto();">Aceptar</div>
						<div id="buttonCancel" class="form-button" onClick="redirect('GestionProducto.php');">Cancelar</div>
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
		Verifica si es la opcion de modificar un producto, si lo es, agrega los scripts y carga los datos correspondientes
	*/
	include("../php/Producto.class.php");
	if ( isset($_GET["id"]) ){
		$emp = $_GET["id"];
		$encontrado = Producto::findById($emp);
?>
	<script type="text/javascript">
	
		document.getElementById('idProducto').value = "<?php echo $encontrado->getId(); ?>";
		document.getElementById('nombreP').value = "<?php echo $encontrado->getNombre(); ?>";
		document.getElementById('precioP').value = "<?php echo $encontrado->getPrecio(); ?>";
		document.getElementById('titulo').innerHTML = "Editar Producto";
		document.getElementById('buttonOK').innerHTML = "Editar";
		field = document.getElementById('content'); 
		field.removeChild(document.getElementById('recetaTitle')); 
		field.removeChild(document.getElementById('recetaTable'));
		
		modify = true;
	</script>
<?php
	}
?>
<!-- Agrega los scripts de la pantalla y el modulo -->
<?php include("scripts.php"); ?>
<script type="text/javascript">
	/* Agrega el producto a la base de datos */
	function agregarProducto(){
		
		parametros = "idProducto=" + document.getElementById('idProducto').value + "&";
		parametros += "nombreP=" + document.getElementById('nombreP').value + "&";
		parametros+= "precioP=" + document.getElementById('precioP').value;
		if(!modify)
		{
			var arrayElements = new Array();
			var arrayElementsIDES = new Array();
		    arrayElements = document.getElementsByClassName("cantidades");					
			arrayElementsIDES = document.getElementsByClassName("ides");
			
			for(i=1;i<=arrayElements.length;i++)
			{
				parametros+="&materiaPrima"+i+"="+arrayElementsIDES[i-1].value;				
				parametros+="&cantidad"+i+"="+arrayElements[i-1].value;	
			}
			parametros+="&numeroFilas="+arrayElements.length;	
		}
		if ( modify ){
			parametros +="&edit=1";
		}
		
		parametros = parametros.replace("#","%23");
		sendPetitionQuery("AgregaProd.php?" + encodeURI(parametros));
		console.log("AgregaProd.php?" + encodeURI(parametros));
		/* returnedValue almacena el valor que devolvio el archivo PHP */
		if (returnedValue == "OK" ){
			if ( modify ){
				alert("El producto ha sido editado exitosamente");
			}else{
				alert("El producto ha sido agregado exitosamente");
			}
			window.location = "./GestionProducto.php";
		}
		else if ( returnedValue == "DATABASE_PROBLEM"){
			alert("No se pudo establecer conexión con la base de datos");
		}
		else if ( returnedValue == "INPUT_PROBLEM"){
			alert("Datos con formato inválido");
		} else {
			alert ("Error al intentar agregar el producto "+ returnedValue);
		}
	}
	
	
	
	
	function valida( str, target, validate ){
		if ( validate == "nombre" ){
			str = str.trim();
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' />El nombre es un campo obligatorio.";	
			}
			else{
				var re = /^[a-zA-Z áéíóúÁÉÍÓÚ]{3,}$/;
				ok = re.exec(str);
				if ( !ok ){
					document.getElementById(target).innerHTML = "<img src='../img/error.png' />El nombre sólo acepta tipo alfabético.";	
				}else{
					document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				}
			}
		}
		
		else if ( validate == "precio") {
			str = str.trim();
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' />El precio es un campo obligatorio.";	
			}
			else{
				var re =/^[0-9]*(\.[0-9]+)?$/;
				ok = re.exec(str);
				if ( !ok ){
					document.getElementById(target).innerHTML = "<img src='../img/error.png' />El precio sólo acepta tipo numérico.";	
				}else{
					document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				}
			}
			
		}
		else if ( validate == "cantidad") {
			str = str.trim();
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' />La cantidad es un campo obligatorio.";	
			}
			else{
				var re =/^[0-9]+$/;
				ok = re.exec(str);
				if ( !ok ){
					document.getElementById(target).innerHTML = "<img src='../img/error.png' />La cantidad sólo acepta tipo numérico entero.";	
				}else{
					document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				}
			}
			
		}
	}
	function AddMP()
	{
		selector=document.getElementById("SelIngrediente");
		
		if(selector.value=='nuevo')
		{
			window.location='GestionProducto.php'
		}
		else
		{
			
			nuevoIngreso=document.getElementById(selector.value);
			if(nuevoIngreso==undefined)
			{
				field = document.getElementById('cuerpoT'); 
				tabla= document.getElementById('table-aux'); 
				actual=tabla.rows.length;
				
				celda1= document.createElement('td'); 
				texto=document.createElement('span');
				texto.id='ide'+actual;
				texto.name='ide'+actual;
				texto.innerHTML=selector.options[selector.selectedIndex].text;
				celda1.appendChild(texto);
				
				celda4= document.createElement('td'); 
				unidad=document.createElement('span');
				unidad.id='unidad'+actual;
				unidad.name='unidad'+actual;
				unidad.innerHTML=document.getElementById('unidad'+selector.value).value;
				celda4.appendChild(unidad);
				
				celda5= document.createElement('td'); 
				mensaje=document.createElement('span');
				mensaje.id='MSG'+actual;
				mensaje.name='MSG'+actual;
				celda5.appendChild(mensaje);
				celda5.className="opc";
				
				input=document.createElement('input');
				input.id='cantidad'+actual;
				input.name='cantidad'+actual;
				input.className='cantidades';
				input.type = 'text';
				input.setAttribute("onblur","valida(input.value,'MSG"+actual+"','cantidad');");
				input.placeholder='Cantidad de Ingrediente';
				celda2= document.createElement('td'); 
				celda2.appendChild(input);	
				
				celda3= document.createElement('td'); 
				divIMG= document.createElement('div'); 
				
				imagen=document.createElement('img'); 
				imagen.src="../img/less.png";
				imagen.alt="Eliminar";
				imagen.name="eliminar"+selector.value;
				divIMG.appendChild(imagen);
				divIMG.className ='evento';	
				divIMG.id ='divIMG'+selector.value;	
				divIMG.setAttribute( "onclick","quitarIngrediente("+selector.value+");");
				celda3.className='opc';
				celda3.appendChild(divIMG);	
				
				renglon = document.createElement('tr'); 
				renglon.className ='tr-cont'; 
				renglon.id=selector.value;
				renglon.name=selector.value;
			
				renglon.appendChild(celda1);
				renglon.appendChild(celda4);
				renglon.appendChild(celda2);
				renglon.appendChild(celda3);
				renglon.appendChild(celda5);
				field.appendChild(renglon);

				//se alamacenan los idMP
				idMP=document.createElement('input');
				idMP.id='idMP'+actual;
				idMP.name='idMP'+actual;
				idMP.type = 'hidden';
				idMP.className='ides';
				idMP.value=selector.value;
				field.appendChild(idMP);
			}
			else
			{
				alert("El ingrediente con identificador "+selector.value+" ya existe");
			}
		}
		
	}
	
	
	function quitarIngrediente(obj)
	{
	  field = document.getElementById('cuerpoT'); 
	  field.removeChild(document.getElementById(obj)); 
	}
	
</script>