<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Registrar Venta</title>
        <link rel="stylesheet" type="text/css" href="../css/styleRV.css" />
         <?php include('scripts.php'); ?> 	
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
                <div id="ti" class="titulo">REGISTRAR VENTA</div>
                 <div id="tip" class="texto1">Todos los campos son obligatorios.</div>
                <form name="Rvalida">
                	<div id="foli" class="texto">FOLIO:</div>
                    <div id="fol" class="texto">0000001</div>
                	<div id="periodo" class="texto">FECHA:</div>
                	<div id="fech" class="texto">
					<script type="text/javascript">
					var date = new Date();
					var d  = date.getDate();
					var day = (d < 10) ? '0' + d : d;
					var m = date.getMonth() + 1;
					var month = (m < 10) ? '0' + m : m;
					var yy = date.getYear();
					var year = (yy < 1000) ? yy + 1900 : yy;
					document.write(month + "/" + day + "/" + year);
					</script></div>
		
                    <div id="cliente" class="texto">CLIENTE</div>
                    <div id="cliente1"class="box">
                       <select name="cliente"><option>Elige una opci&oacute;n</option><option value="C1">Cliente1</option></select>
                    </div> 
                     <div id="abrir"><input type="button" value="ABRIR VENTA" onClick="valida()"></div>
                    
                    <!--Seccion de articulos-->
                    
                    <div id="articulos" class="texto">ARTICULOS</div>
                    <div id="linea"></div>
                    <div id="producto" class="texto">PRODUCTO</div>
                    <div id="producto1"class="box">
                       <select name="producto" disabled><option>Elige una opci&oacute;n</option><option value="G1">Galleta1</option></select>
                    </div> 
                    <div id="canti" class="texto">CANTIDAD</div>
                    <div id="cant">
                       <input type="text" name="cantidad" size="5" maxlength="7" placeholder="# # # # #" disabled/>
                    </div>
                    <div id="ex" class="texto">EXISTENCIA</div>
                    <div id="exi">
                       <input type="text" name="existencia" size="5" maxlength="7" value="50000" disabled/>
                    </div>
                    <div id="entrega" class="texto">FECHA DE ENTREGA</div>
                    <div id="fechent" class="box">
                       <input type="text" id="to" name="to" placeholder="Fecha de Entrega" disabled/> 
                    </div> 
                    <div id="agregar"><input type="button" name="agregar" value="AGREGAR ARTICULO" onClick="valida_articulo()" disabled></div>
                    
                    <!---Aqui va la tabla-->       
                    <div id="boton"><input type="button" name="cerrar" value="CERRAR VENTA" onClick="valida_venta()" disabled></div>
                    <div id="boton2"><input type="button" value="CANCELAR" onClick="cancelar()"></div>  
                  </form>
                </div>
            </div>
			
        
        
    </body>   
</html>