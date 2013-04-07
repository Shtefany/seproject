<?php
	include("WebSession.class.php");
	session_start();
	if ( isset($_SESSION["websession"] )){
		$sesion = unserialize($_SESSION["websession"]);
		$sesion->accessControl();
	} else {
		header("location:/seproject/index.php");
	}
?>