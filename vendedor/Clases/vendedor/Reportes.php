<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Reportes</title>
        <link rel="stylesheet" type="text/css" href="../css/styleRep.css" />
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
                <div id="tir" class="titulo">CONSULTAR REPORTES</div>
                <div id="tip" class="texto1">Todos los campos son obligatorios.</div>
                <form name="Rvalida">
                	
                	<div id="periodo" class="texto">PERIODO</div>
                    <div id="fechini" class="box">
                       <input type="text" id="from" name="from" placeholder="Fecha de inicio"/>
                    </div>
                    <div id="fechfin" class="box">
                       <input type="text" id="to" name="to" placeholder="Fecha de fin"/> 
                    </div>
                    <div id="cliente" class="texto">CLIENTE</div>
                    <div id="cliente1"class="box">
                       <select name="cliente"><option>Elige una opci&oacute;n</option><option valu="C1">Cliente1</option></select>
                    </div> 
                    <div id="producto" class="texto">PRODUCTO</div>
                    <div id="producto1"class="box">
                       <select name="producto"><option>Elige una opci&oacute;n</option><option value="G1">Galleta1</option></select>
                    </div> 
                    <div id="pedi" class="texto">PEDIDOS</div>
                    <div id="r1"><input type="radio" name="filtro" value="Pedidos" onClick="aparece()" ></div> 
                    <div id="vent" class="texto">VENTAS</div>
		            <div id="r2"><input type="radio" name="filtro" value="Ventas" onClick="aparece()"> </div>
		            
		            <div id="edo" class="texto">ESTADO</div>
                    <div id="edo1"class="box">
                       <select name="pedidos" disabled><option>Elige una opci&oacute;n</option><option>Todo</option><option>Vendido</option><option>Cancelado</option><option>En espera</option></select>
                    </div> 
                    <div id="edo2"class="box">
                       <select name="ventas" disabled><option>Elige una opci&oacute;n</option><option>Todo</option><option>Reportado</option><option>Devuelto</option></select>
                    </div> 
                               
                    <div id="boton"><input type="button" value="ACEPTAR" onClick="valida()"></div>
                  
                    <div id="boton2"><input type="button" value="CANCELAR" onClick="cancelar()"></div>  
                  </form>
                </div>
            </div>
			
    </body>   
</html>