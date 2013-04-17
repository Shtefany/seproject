<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Gestionar Materia Prima</title>
        <link rel="stylesheet" type="text/css" href="../css/mainStyle.css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui.css">     
    </head>    
    <body>
    <!-- El header es el mismo para todas las paginas-->
        <div id="header">
            <div id="leftHeader">
                <img src="../img/user.png" class="img-header" alt="Username" />
                <div id="userName" class="text-header">Usuario de Inventarios</div>
                <img src="../img/noti.png" class="img-header" alt="Notificaciones" />
                <img src="../img/out.png" class="img-header" alt="Salir" />
            </div>
            <div id="rightHeader">
                <img src="../img/Banner1.png" class="img-banner" alt="Sistema" />
            </div>
        </div>
        <center>
        <div id="mainDiv">
        <!-- Aquí se coloca el menú -->
             <nav>
                <div class="selected-button"><img src="../img/archive.png"  alt="Icono" class="img-icon"/>Gestión de Materia Prima
                    <ul class="sub-level" type="none">
                        <li onclick="redirect('gestion_ma.php');">Gestión de Materia Prima</li>
                        <li onclick="redirect('ingresar_ma.php');">Ingresar Materia Prima</li>

                    </ul>
                </div>
                <div class="button" onclick="redirect('gestion_p.php');"><img src="../img/archive.png"  alt="Icono" class="img-icon" />Gestión de Productos</div>
                <div class="button"><img src="../img/notepad.png"  alt="Icono" class="img-icon"/>Reportes
                        <ul class="sub-level" type="none">
                            <li onclick="redirect('reportes_ma.php');">Generar Reporte Materias Primas</li>
                            <li onclick="redirect('reportes_p.php');">Generar Reporte de Productos</li>
                        </ul>
                </div>
            </nav>  
  <!-- Divisor del contenido de la pagina -->
            <div id="all-content">
                <div id="content">
                    <h2>Gestión de Productos</h2>
                    <div class="box">
                        <table>
                            <tr>
                                <td class="auxiliarB">
                                    <div onclick="redirect('AgregarEmpleado.php');" class="form-button">Agregar Empleado</div>
                                </td>
                                <td class="auxiliarB"></td>
                                <td class="auxiliarB"></td>
                                <td class="auxiliarB">
                                    <input type="text" id="buscar" name="buscar" placeholder = "Buscar en los empleados" class="searchBar"/>
                                </td>
                                <td>
                                    <img src="../img/busc.png" class="img-buscar"  alt="Buscar" onClick="onClickBusqueda();"/>
                                </td>
                            </tr>

                        </table>
                    </div>   
                    <div id="tablaMateria" class="box">
                        <?php include("TablaProducto.php"); ?>
                    </div>
                    
                    </div>                      
                </div>
            </div>
        </center>
        <footer>Elaborado por nosotros(C) 2013</footer>
    </body>   
</html>

<script type="text/javascript" src="../js/color.js"></script>
<script type="text/javascript" src="../js/inventarios.js"></script>
<script type="text/javascript">
    window.onload = initialize;
    window.onresize = function () { resizeWindow(document) };
    function initialize() {
        resizeWindow(document);
    }
    $(function () {
        var dates = $("#from, #to").datepicker
        (
            {
                defaultDate: "+1w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1,

                onSelect: function (selectedDate) {
                    var option = this.id == "from" ? "minDate" : "maxDate",
                        instance = $(this).data("datepicker"),
                        date = $.datepicker.parseDate(
                            instance.settings.dateFormat ||
                            $.datepicker._defaults.dateFormat,
                            selectedDate, instance.settings);
                    dates.not(this).datepicker("option", option, date);
                }
            }
        );
    });
</script> 
<script type="text/javascript" src="../js/jquery-1.5.1.js"></script>
<script type="text/javascript" src="../js/jquery.ui.core.js"></script>
<script type="text/javascript" src="../js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="../js/navigation.js"></script>        
