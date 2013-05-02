<?php include("../php/AccessControl.php"); ?>
<?php
	include("../php/Cliente.class.php");
	$clie = $_GET["id"];
	$encontrado = Cliente::findById($clie);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Modificar Cliente</title>
        <link rel="stylesheet" type="text/css" href="../css/registrarcliente.css" />
      <?php include('scripts.php');?> 
    </head>    
    <body>
	 <?php include('header.php');?>   
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
            <?php include('Menu.php');?> 
            <div id="all-content">
				<!--<br/>
                <div id="ENTRADA"><center>Bienvenido al <br/> Modulo de Ventas</center></div>-->
               <div id="Formulario">
               	
                 <form name="Rvalida"><center>
                <div id="cab" class="titulo">REGISTRAR CLIENTE</div>
                <div id="dvrfc" class="divform">RFC:<input type="text" id="RFC" class="tb" name="RFC" maxlength="13" readonly="readonly" value="RRR123456QYT" disabled/></div>
                <div id="dvnom" class="divform">Nombre:<input type="text" id="nom" class="tb" name="nom" value="Cliente 1"/></div>
                <div id="dvtel" class="divform">Tel&eacute;fono:<input type="text" id="tel" class="tb" name="tel" value="56-78-90-34" maxlength="25"/></div>
                <div id="dvema" class="divform">E-mail:<input type="text" id="ema" class="tb" name="ema" value="cliente1@gmail.com"/></div>
                <div id="dvdir" class="divform">Direcci&oacute;n:</br><textarea id="dir" class="ta" name="dir" rows="10" cols="10">Ote 179 Col. Condesa</textarea></div>
                <div id="botones"><input type="button" value="MODIFICAR" onClick="valida()"><input type="button" value="CANCELAR" onClick="cancelarmv()"></div>
                 </center></form>
                </div>
            </div>  
  
    </body>   
</html>