<?
include("../php/DataConnection.class.php");

$idProd= $_POST["ide"];

$db = new DataConnection();
$query="Delete from producto where idProducto=".$idProd.";";
$db->executeQuery($query);
if($db!=false)
{
	echo '<script>';
	echo 'alert("El producto ha sido eliminado exitosamente");';		
	echo "window.location='GestionProducto.php'";
	echo '</script>';
}
else
{
	echo '<script>';
	echo 'alert("Error al intentar eliminar el producto");';
	echo "window.location='GestionProducto.php'";
	echo '</script>';	
}

?>
