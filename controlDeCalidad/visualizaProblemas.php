<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Visualizar problemas</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">  
        <style>
            #fechas {display: none;}
            #estatus{display: none;}        
        </style>      
    </head>    
    <body>
    	<?php include("header.php"); ?>
        <center>
        <div id="mainDiv">
            <nav>
                <div class="selected-button" onclick="redirect('visualizaProblemas.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Visualizar problemas</div>
                <div class="button" onclick="redirect('seguimiento.php');"><img src="../img/configuration2.png" alt="Icono" class="img-icon" />Seguimiento de producto</div>
                <div class="button" onclick="redirect('crearReporte.php');"><img src="../img/notepad.png"  alt="Icono" class="img-icon" />Reporte general</div>
            </nav>
            <div id="all-content">
				
                <h2>Visualizar problemas</h2>
                <div id="content">
                    <div class="box">
                       Etapa del proceso: <select><option>Producción</option><option>Ventas</option><option>Compras</option></select>
                    </div>
                    <div class="box">
                        <h4>Periodo de tiempo</h4>
                        <div class="option"><input type="radio" name="filtroTiempo" checked="checked" onclick="toggleState('fechas',false);" /> Todos los reportes</div>
                        <div class="option"><input type="radio" name="filtroTiempo" onclick="toggleState('fechas',true);" /> Por periodo de tiempo</div>
                        <div class="box" id="fechas">
                            Fecha inicial: <input type="text" id="from" name="from" placeholder="Fecha de inicio"/>
                            Fecha final: <input type="text" id="to" name="to" placeholder="Fecha de fin"/> 
                        </div>
                    </div>            
                    <div class="box">
                        <h4>Estado</h4>
                        <div class="option"><input type="radio" name="filtroEstatus" checked="checked" onclick="toggleState('estatus',false);"  /> Todos los reportes</div>
                        <div class="option"><input type="radio" name="filtroEstatus" onclick="toggleState('estatus',true);"  /> Por estatus</div>
                        <div class="option" id="estatus"><select><option>Pendiente</option><option>Solucionado</option></select></div>
                    </div>
                    <div class="box">
                        <div class="form-button">Visualizar problemas</div>
                    </div>
                </div>
            </div>			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>
<script type="text/javascript">
    function toggleState(element, bvar) {
        var e = new String(element);
        if (!bvar) {
            document.getElementById(e).style.display = "none";
        } else {
            document.getElementById(e).style.display = "block";
        }
    }
</script>    