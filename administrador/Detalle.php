<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Notificaciones</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">
    </head>    
    <body>
    	<?php include("header.php"); ?>

		<center>
        <div id="mainDiv">
            <nav>
				<div class="button" onclick="redirect('Notificaciones.php');"><img src="../img/back.png"  alt="Icono" />Regresar</div>
            </nav>
            <div id="all-content">
				<center>
                <table>
                <tr>
                <td><h1>Asunto</h1></td>
                <td>
                    <div class="evento">
                            <img src="../img/less.png" alt="Eliminar" name="eliminar" onclick="elimina()"/>
                    </div>
                    
                </td>
                </tr>
                </table>

                </center>
                
                <div id="content">
                    <center>
                    <div class="box">
			           Se muestra el detalle de la notificación
                    </div>
                    </center>
                </div>
            </div>
			
        </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>