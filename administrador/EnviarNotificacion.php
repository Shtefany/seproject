<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Enviar Notificación</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="..../css/jquery-ui.css">
    </head>    
    <body>
    	<?php include("header.php"); ?>

		<center>
        <div id="mainDiv">
            <nav>
                
                <div class="button" onclick="redirect('Notificaciones.php');">
					<img src="../img/back.png"  alt="Icono" />
					Cancelar
				</div>

            </nav>
            <div id="all-content">
				<center>
                    <h1>Enviar Notificación</h1>
                    
                    <form name="formulario">
                    <div id="content">
                        
                        <div class="box">
                            <p>Seleccione el área a donde envíara la notificación </p>
			                Área: <select><option>Todas</option>
                                          <option>Compras</option>
                                          <option>Control de Calidad</option>
                                          <option>Inventario</option> 
                                          <option>Producción</option>
                                          <option>Ventas</option>
                                  </select>
                        </div>
                        <div class="box">
                            Asunto: <input type="text" id="asunto" name="asunto" placeholder="Asunto"/>
                        </div>
                        <div class="box">
                            <textarea id="mensaje" name="mensaje" cols="60" rows="6" placeholder="Mensaje"></textarea>
                        </div>
        
                        <div class="box">
                            <div class="form-button" onclick="sendit(); return false;">
                                <img src="../img/openmail.png"  alt="Icono" /> 
                                Enviar     
                            </div>
                        </div>
                        </form>
                 </center>
            </div>
			</div>
		</center>
        </div>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>
<?php include("scripts.php"); ?>