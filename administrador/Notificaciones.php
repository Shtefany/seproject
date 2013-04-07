<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Notificaciones</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css"/>
    </head>    
    <body>
    	<?php include("header.php"); ?>
        </div>
		<center>
        <div id="mainDiv">
            <nav>
				<div class="button" onclick="redirect('Administrador.php');"><img src="../img/back.png"  alt="Icono" />Regresar</div>
            </nav>
            <div id="all-content">
				<center>
                    <h1>Notificaciones</h1>
                </center>
                
                <div id="content">
                    <div class="box">
                     
                        <div class="form-button" onclick="redirect('EnviarNotificacion.php');"><img src="../img/openmail.png"  alt="Icono" height="20px"/>Enviar Notificación</div>
                     
                    </div>
					<div class="box">
					   <table id="table-content">
									<tr class="tr-header">
										<td><h2>Área</h2></td>
										<td><h2>Asunto</h2></td>
										<td class="opc"> </td>
									</tr>
									<tr class="tr-cont">
										<td>Compras</td>
										<td>Problema de materia prima</td>
										<td class="opc">
										   <img src="../img/less.png" alt="Eliminar" name="eliminar" onclick="elimina()"/>
										</td>
									</tr>
									<tr class="tr-cont">
										<td>Ventas</td>
										<td onclick="redirect('Detalle.php');">Reporte del cliente AORL920913</td> 
										<td class="opc">
											<img src="../img/less.png" alt="Eliminar" name="eliminar" onclick="elimina()"/>
										</td>
									</tr>
									<tr class="tr-cont">
										<td>Producción</td>
										<td>Problema al producir lote</td> 
										<td class="opc">
											<img src="../img/less.png" alt="Eliminar" name="eliminar" onclick="elimina()"/>
										</td>
									</tr>
									<tr class="tr-cont">
										<td>Inventario</td>
										<td>Producto caducó en almacén</td> 
										<td class="opc">
										   <img src="../img/less.png" alt="Eliminar" name="eliminar" onclick="elimina()"/>
										</td>
									</tr>
							</table>
						</div>
                </div>
            </div>
			
        </div>
        </center>

        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>