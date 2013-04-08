<?php

//Es para importar los elementos de otro archivo .php
include("conexion.php");


$nombre = $_POST['name'];
$proveedor = $_POST['provider'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$fecha_Ll = $_POST['from'];
$fecha_Ca = $_POST['to'];


//Generas la conexion con el MySql
$con = mysql_connect($host, $usuario, $pw) or die("Problemas al conectar");
//Selecciona la BD con la que vamos a trabajar
mysql_select_db($bd, $con) or die("Problemas al conectar");


echo $nombre."<br>".$proveedor."<br>".$cantidad."<br>".$precio."<br>".$fecha_Ll."<br>".$fecha_Ca;

$registro1 = mysql_query("SELECT * from proveedor p where Nombre = '$proveedor'") or die("Problema al consultar".mysql_error());

while($reg1 = mysql_fetch_array($registro1))
{
	
	$idProveedor = $reg1['RFC'];
	
}

//Crea la consulta a realizar
mysql_query("INSERT into materia_prima(Nombre, Unidad, Fecha_Llegada, Fecha_Caducidad) VALUES('$nombre', $cantidad, '$fecha_Ll', '$fecha_Ca')", $con) or die(mysql_error());



$registro2 = mysql_query("SELECT m.idMateria from materia_prima m where m.Nombre = '$nombre'");

while($reg2 = mysql_fetch_array($registro2))
{
	
	$idMateria = $reg2['idMateria'];
	
}

mysql_query("INSERT into materia_proveedor(Precio_lote, idMateria, Proveedor_RFC) VALUES($precio, $idMateria, '$idProveedor');", $con);


echo "Datos insertados";

?>

