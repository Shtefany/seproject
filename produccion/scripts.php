
        <link rel="stylesheet" type="text/css" href="../css/estiloproduccion.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.2.custom.css">
        <script type="text/javascript" src="../js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.10.2.custom.min.js"></script>
        <script src="js/script.js"></script>
        <script src="../js/navigation.js"></script>
        
        <script type="text/javascript">
		    window.onload = resizeWindow;
		    window.onresize = resizeWindow;
			<!-- Funcion para redimensionar la ventana-->
		    function resizeWindow() {
                var w = window.innerWidth;
                if (w < 1060) {
                    var newSize = w - 260;
                    var windowSize = w - 60;
                    document.getElementById("all-content").style.width = new String(newSize) + "px";
                    document.getElementById("mainDiv").style.width = new String(windowSize) + "px";
                    console.log(newSize);
                    console.log(document.getElementById("all-content").style.width);
                } else {
                    document.getElementById("all-content").style.width = "800px";
                    document.getElementById("mainDiv").style.width = "1000px";
                }
		    }
		</script> 