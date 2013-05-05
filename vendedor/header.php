<<<<<<< HEAD
<!--	header     -->
<div id="header">
	<div id="leftHeader">
		<img src="../img/user.png" class="img-header" alt="Username" />
		<div id="userName" class="text-header"><?php echo $sesion->getEmpleado()->getNombre(); ?></div>
		<img src="../img/noti.png" class="img-header" alt="Notificaciones" onclick="openInbox();" />
		<img src="../img/out.png" class="img-header" alt="Salir" onclick="redirect('../logout.php');"/>
	</div>
	<div id="rightHeader">
		<img src="../img/Banner1.png" class="img-banner" alt="Sistema" />
	</div>
</div>
<div id="msgInbox">
    <div id="inbox">
        <center>
            <h1>Notificaciones</h1>
        </center>
        <div id="content">
            <div class="box">
                <div class="form-button"><img src="../img/openmail.png"  alt="Icono" height="20px"/>Enviar Notificaci&oacute;n</div>
                <div class="form-button" onclick="closeInbox();">Cerrar</div>
             </div>
    		<div class="box">
                <div id="messages">Aqui van los mensajes</div>
            </div>			            
       </div>
    </div>
</div>
<div id="details">
    <div id="inbox">
        <center>
            <h1>Detalle</h1>
        </center>
        <div id="content">
            <div class="box">
                <div class="form-button"><img src="../img/openmail.png"  alt="Icono" height="20px"/>Responder</div>
                <div class="form-button" onclick="closeDetails();">Cerrar</div>
             </div>
    		<div class="box">
                <div id="msgDetail">Aqui van el detalle</div>
            </div>			            
       </div>
    </div>
</div>
<!-- end of header -->
=======
<header>
	<div id="leftHeader">
        <img src="../img/user.png" alt="Username"  class="img-header" width="30" height="30"/>
		<div id="userName" class="text-header" title="Usuario de Ventas"><?php echo $sesion->getEmpleado()->getNombre(); ?></div>
		
    	<img src="../img/noti.png" class="img-header" alt="Notificaciones" width="30" height="30" usemap="#map1"/>
    	<map name="map1" id="map1">
		  <area shape="rect" coords="0,0,30,30" alt="shape" title= "Ver Notificaciones" href="Notificaciones.php"/>
		</map>
        
    	<img src="../img/out.png" class="img-header" alt="Salir" width="30" height="30" usemap="#map"/>
		<map name="map" id="map">
		    <area shape="rect" coords="0,0,30,30" alt="shape" title= "Salir" href="../logout.php"/>
		</map>
	</div>
    <div id="rightHeader">
        <img src="../img/Banner1.png" class="img-banner" alt="Sistema"/>
    </div>
</header>
        
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
