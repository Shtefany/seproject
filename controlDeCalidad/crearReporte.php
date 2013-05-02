<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Creación de reporte general</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">        
    </head>    
    <body>
    	<?php include("../php/header.php"); ?>
        <center>
        <div id="mainDiv">
            <nav>
                <div class="button" onclick="redirect('visualizaProblemas.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Visualizar problemas</div>
                <div class="button" onclick="redirect('seguimiento.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Seguimiento de producto</div>
                <div class="selected-button" onclick="redirect('crearReporte.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Reporte general</div>
            </nav>
            <div id="all-content">				
                <h2>Creación de reporte general</h2>
                <div id="content">
                    <div class="box">
                       Fecha inicial: <input type="text" id="from" name="from" placeholder="Fecha de inicio"/>
                    </div>
                    <div class="box">
                       Fecha final: <input type="text" id="to" name="to" placeholder="Fecha de fin"/> 
                    </div>
                    <div class="box">
                        <h4>Áreas que abarcará el reporte</h4>
                        <div class="option"><input type="checkbox" value="materiaPrima" /> Todas</div>
                        <div class="option"><input type="checkbox" value="materiaPrima" /> Producción</div>
                        <div class="option"><input type="checkbox" value="materiaPrima" /> Inventario</div>
                        <div class="option"><input type="checkbox" value="materiaPrima" /> Compras</div>
                        <div class="option"><input type="checkbox" value="materiaPrima" /> Ventas</div>                        
                    </div>            
                    <div class="box">
                       Ordenar por: <select><option>Estatus</option><option>Área</option><option>Fecha</option></select>
                    </div>        
                    <div class="box">
                        <div class="form-button" onclick="redirect('../pdf/reporte.pdf');">Crear reporte</div>
                    </div>
                </div>
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>