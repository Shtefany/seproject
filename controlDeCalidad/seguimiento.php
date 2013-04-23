<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Seguimiento</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">        
    </head>    
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('visualizaProblemas.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Visualizar problemas</div>
                <div class="selected-button" onclick="redirect('seguimiento.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Seguimiento de producto</div>
                <div class="button" onclick="redirect('crearReporte.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Reporte general</div>
            </nav>
            <div id="all-content">				
                <h2>Seguimiento del producto</h2>
                <div id="content">
                    <div class="box">
                        <h4>Número de lote</h4>
                        <div class="option"><input type="radio" name="filtroLote" checked="checked" />Por número de lote de Materia prima</div>
                        <div class="option"><input type="radio" name="filtroLote" />Por número de lote de Producto</div>
                    </div>
                    <div class="box">
                       Número de lote: <input type="text" placeholder="Ingrese aquí el lote" />
                    </div>        
                    <div class="box">
                        <div class="form-button">Rastrear producto</div>
                    </div>
                </div>
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>