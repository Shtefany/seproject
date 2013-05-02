<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>
<table id="msg">
<?php	
	include("../php/DataConnection.class.php");	
	include("../php/AccessControl.php");	
	include("../php/Validations.class.php");
	
	$db = new DataConnection();
	$result = $db->executeQuery("SELECT * FROM Area");
	$name = "area";
	if ( isset($_GET["name"]) ){
		$name = Validations::cleanString($_GET["name"]);
	}
	
	echo "<tr>";
	echo "<td>Asunto</td><td><input type='text' id='asunto' size='50' /></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Destinatario</td><td>";
	echo "<select id='".$name."' name='".$name."'>";
	while( $dato = mysql_fetch_assoc($result) ){
		echo "<option value='".$dato["id"]."'>".$dato["nombre"]."</option>";
	}
	echo "</select></td></tr>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Mensaje</td>";
	echo "<td><textarea id='mensaje' cols='50' rows='8'></textarea></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td></td>";
	echo "<td><input type='checkbox' id='problema'>Notificar a Control de Calidad</td>";
	echo "</tr>";
	
?>
</table>

