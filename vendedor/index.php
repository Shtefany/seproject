<?php include("../php/AccessControl.php"); ?>
<<<<<<< HEAD
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Modulo Ventas</title>
        <link rel="stylesheet" type="text/css" href="../css/ventas.css" />
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
         <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">		
=======
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Cookies and System</title>
        <link rel="stylesheet" type="text/css" href="../css/ventastyle/styleB.css" />
        <?php include('scripts.php'); ?> 

		
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
    </head>    
    <body>
	<!-- El header es el mismo para todas las paginas-->
    	<?php include('header.php');?> 
        <center>
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
<<<<<<< HEAD
            <nav>
			      <div id="GV" class="button" onClick="window.location ='GestionV.php'"><img src="../img/archive.png"  alt="Icono" class="img-icon"/>Gestión de Ventas</div>     
				  <div id="GC" class="button" onClick="window.location ='GestionC.php'"><img src="../img/card.png"  alt="Icono" class="img-icon"/>Gestión de Clientes</div>
				  <div id="rep" class="button" onClick="window.location ='Reportes.php'"><img src="../img/notepad.png"  alt="Icono" class="img-icon"/>Crear Reportes</div>
			</nav>
=======
            <?php include('Menu.php');?> 
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
			<!-- Divisor del contenido de la pagina -->
            <div id="all-content">
				<br/>
                <div id="ENTRADA"><center>Bienvenido al <br/> Modulo de Ventas</center></div>
            </div>  
        </center>
        
    </body>   
</html>
<<<<<<< HEAD
<?php include('scripts.php'); ?> 
=======
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
<?php include("actua.php"); ?>