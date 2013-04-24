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
    	<?php include("../php/header.php"); ?>
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
				<table style="margin-left: 10px">
				<tr style='background-color:#333333; color: white;'>
					<td><h2>Fecha</h2></td>
					<td><h2>Remitente</h2></td>
					<td><h2>Asunto</h2></td>
				</tr>
                <?php				
				include("../php/DataConnection.class.php");	
				$db = new DataConnection();
				$qry = "SELECT * FROM Mensajes,Empleado WHERE Mensajes.remitente = Empleado.CURP and Mensajes.archivado = 0 and Mensajes.problema = 1 ORDER BY id DESC";
				$result = $db->executeQuery($qry);
				$cont = 0;
				while($fila = mysql_fetch_array($result))
				{		
					$cont++;
					echo "<tr style='background-color:#DDDDDD;'>";
					echo "<td>".$fila["fecha"]."</td>";
					echo "<td>".$fila["Nombre"]."</td>";
					echo "<td>".$fila["asunto"]."</td>";
					echo "<td><span class='clickable' onclick='despliegaDetalles(".$fila["id"].");'>Ver detalles</span></td>";
					echo "</tr>";
				}
				if ( $cont == 0 ){
					echo "<tr style='background-color:#DDDDDD;'>";
					echo "<td colspan='4'>No hay mensajes</td>";
					echo "</tr>";
				}
				?>
				</table>
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
	
	function despliegaDetalles(id){
		document.getElementById("details").style.display = "block";
		document.getElementById("details").style.height  = window.innerHeight + "px";
		document.getElementById("details").style.width = window.innerWidth + "px";
		sendPetitionSync("../php/details.php?id=" + id,"msgDetail",document);
		document.getElementById("botonArchivarCC").style.display = "block";
		document.getElementById("botonArchivar").style.display = "none";
	}
</script>    