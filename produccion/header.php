    	<header>
            <div id="leftHeader">
            	<a href="index.php" target="_self">
	              	<img src="../img/user.png" class="img-header" alt="Username" title="Usuario de Producción">
                </a>
                <div id="userName" class="text-header"><?php echo $sesion->getEmpleado()->getNombre(); ?></div>
                <img src="../img/noti.png" class="img-header" alt="Notificaciones" 
                title="Notificaciones" onclick="redirect('Notificaciones.php');" />
                <img src="../img/out.png" class="img-header" alt="Salir" title="Salir" 
                onclick="redirect('../logout.php');"/>
            </div>
            <div id="rightHeader">
                <img src="../img/Banner1.png" class="img-banner" alt="Sistema" />
            </div>
        </header>
        