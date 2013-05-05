<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Modificar Venta</title>
        <link rel="stylesheet" type="text/css" href="../css/ventastyle/styleMV.css" />
       	<?php include('scripts.php');?> 
    </head>    
    <body>
	<!-- El header es el mismo para todas las paginas-->
    <?php include('header.php');?>   
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
            <?php include('Menu.php');?> 
			<!-- Divisor del contenido de la pagina -->
            <div id="all-content">
				<br/>
                <div id="ti" class="titulo">MODIFICAR VENTA</div>
                <form name="Rvalida">
                	<div id="foli" class="texto">FOLIO</div>
                    <div id="fol">
                       <input type="text" name="folio" size="4" maxlength="7" value="0000001" id= "Fol" disabled/>
                    </div>
                	<div id="periodo" class="texto">FECHA</div>
                    <div id="fech" class="box">
                       <input type="text" id="from" name="from" placeholder="Fecha de Registro" disabled/>
                    </div>
                    <div id="cliente" class="texto">CLIENTE</div>
                    <div id="cliente1"class="box">
                      <!--<?php include("SelectClie.php"); ?> -->
                      <input type="text" id= "clie" disabled/>
                    </div> 
                    
                    
                    <!---Aqui va la tabla--> 
                    
                    <div id="articulos" class="texto">ARTICULOS</div>
                    <div id="linea"></div>
                    <div id="tip" class="texto1">Todos los campos son obligatorios.</div>
                    <div id="producto" class="texto">PRODUCTO</div>
                    <div id="producto1"class="box">
                       <select name="producto"><option>Elige una opci&oacute;n</option><option value="G1">Galleta1</option></select>
                    </div> 
                    <div id="canti" class="texto">CANTIDAD</div>
                    <div id="cant">
                       <input type="text" name="cantidad" size="5" maxlength="7" placeholder="# # # # #"/>
                    </div>
                    <div id="ex" class="texto">EXISTENCIA</div>
                    <div id="exi">
                       <input type="text" name="existencia" size="5" maxlength="7" value="50000" disabled/>
                    </div>
                    <div id="entrega" class="texto">FECHA DE ENTREGA</div>
                    <div id="fechent" class="box">
                       <input type="text" id="to" name="to" placeholder="Fecha de Entrega"/> 
                    </div> 
                    <div id="edo" class="texto">ESTADO</div>
                    <div id="edo1"class="box">
                       <select name="estados"><option>Elige una opci&oacute;n</option><option>Todo</option><option>Devuelto</option><option>Reportado</option></select>
                    </div> 
<<<<<<< HEAD
                    <div id="agregar"><input type="button" name="agregar" value="Agregar Articulo" onClick="valida_articulo()"></div>
                    
                          
                    <div id="boton"><input type="button" name="cerrar" value="Aceptar" onClick="valida_venta()"></div>
                    <div id="boton2"><input type="button"  value="Cancelar" onClick="cancelar()"></div>  
=======
                    <div id="agregar"><input type="button" name="agregar" value="AGREGAR ARTICULO" onClick="valida_articulo()"></div>
                    
                          
                    <div id="boton"><input type="button" name="cerrar" value="ACEPTAR" onClick="valida_venta()"></div>
                    <div id="boton2"><input type="button"  value="CANCELAR" onClick="cancelar()"></div>  
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
                  </form>
                </div>
            </div>
    </body>   
</html>
<?php
	include("../php/Venta.class.php");
		$vent = $_GET["id"];
		$encontrado = Venta::findById($vent);
?>
<script type="text/javascript">
		//document.getElementById('acept').value = "EDITAR";
		//document.getElementById('clie').disabled="disabled";
		document.getElementById('Fol').value= "<?php echo $encontrado->getFolio(); ?>";
		document.getElementById('clie').value="<?php echo $encontrado->getCliente();?>";
		document.getElementById('from').value="<?php echo $encontrado->getFecha();?>";
		//alert();
		//modify=true;		
	</script>
