<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Reportes</title>
        <link rel="stylesheet" type="text/css" href="../css/ventastyle/styleRep.css" />
        <?php include('scripts.php'); ?> 
        	
    </head>    
    <body>
    	 
	<!-- El header es el mismo para todas las paginas-->
    	
       <?php include('header.php');?> 
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
           <?php include('Menu.php');?> 
			<!-- Divisor del contenido de la pagina -->
            <div id="content1">
				<br/>
                <div id="tir" class="titulo">CONSULTAR REPORTES</div>
                <div id="tip" class="texto1">Todos los campos son obligatorios.</div>
                <form id="formReporte" action="VerReportes.php" method="POST" >
                	<table>
                		<tr>
                		<td><div class="divform">PERIODO</div></td>
                		<td><input type="text" id="from" name="from" placeholder="Fecha de inicio" onblur="valida(this.value,'mfrom','from');"/></td>	
                		<td><span id="mfrom"></span></td>
                		
                		<td><input type="text" id="to" name="to" placeholder="Fecha de fin" onblur="valida(this.value,'mto','to');"/> </td>
                		<td><span id="mto"></span></td>
                		</tr>
                	</table>
                	
                    
                    <div id="cliente" class="texto">CLIENTE</div>
                    <div id="cliente1"class="box">
                      <?php include("SelectClieR.php"); ?>
                    </div> 
                    <div id="producto" class="texto">PRODUCTO</div>
                    <div id="producto1"class="box">
                       <?php include("SelectProdR.php"); ?>
                    </div> 
                    
                   <!-- <div id="vent" class="texto">VENTAS</div>
		  
		            <div id="edo" class="texto">ESTADO</div>
          
                    <div id="edo2"class="box">
                       <select name="estados"><option value='0'>Todo</option><option value="Entregado">Entregado</option><option value="Cancelada">Cancelada</option><option value="null">En espera</option></select>
                    </div> -->
                               
                    <div id="boton" type="submit"><input type="submit" value="ACEPTAR"></div>
                  
                    <div id="boton2"><input type="button" value="CANCELAR" onClick="window.location ='Index.php'"></div>  
                  </form>
                </div>
            </div>
			
    </body>   
</html>
<script type="text/javascript">
function valida( str, target, validate ){
		if ( validate == "from" ){
			str = str.trim();
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' title='La fecha de inicio es obligatoria.'/>";	
			}
			else{
					document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";
				}
			}
		
		else if ( validate == "to"){			
			if ( str.length == 0 ){
				document.getElementById(target).innerHTML = "<img src='../img/error.png' title='La fecha de fin es obligatoria.'/>";	
			}
			
			 else {
				document.getElementById(target).innerHTML = "<img src='../img/ok.png' />";			
			}}
		}
		
	
</script>
