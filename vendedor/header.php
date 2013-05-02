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
        