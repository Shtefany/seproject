<?
include("../php/DataConnection.class.php");

$idProd= $_POST["ideProducto"];
$numero2 = count($_POST);
$valores2 = array_values($_POST);
$numRegistros=($numero2-1)/2;

for ($i = 1; $i < $numero2; $i++) {
    $db = new DataConnection();
	$query="Insert into receta values(".$idProd.",".$valores2[$i].",".$valores2[$i+1].")";
	$db->executeQuery($query);
	$i=$i+1;
}


if($db!=false)
{
	echo '<script>';
	echo 'alert("La receta ha sido registrada exitosamente");';		
	echo "window.location='GestionProducto.php'";
	echo '</script>';
}
else
{
	echo '<script>';
	echo 'alert("Error al intentar registrar la receta");';
	echo "window.location='GestionProducto.php'";
	echo '</script>';	

}


?>
