<table id='table-content'>
	<tr class='tr-header'>
		<th>Lote</th>
		<th>Producto</th>
		<th>Precio</th>
		<th class='opc'> </th>
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/validations.class.php");
	//Inpaginacion
	$db = new DataConnection();
	
	if(isset($_GET['Folio'])){
		$numFolio=($_GET['Folio']);
		$result = $db->executeQuery("SELECT a.numlote,p.nombre,p.precio FROM ArticuloV a, producto p, lote l WHERE  a.idProducto=p.idproducto and a.folio=".$id);
	}
    /*$RegistrosAMostrar=3;
			
	 * 
	if(isset($_GET['pag'])){
		$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
		$PagAct=$_GET['pag'];}
	else{
		$RegistrosAEmpezar=0;
		$PagAct=1;}	*/
	if ( mysql_num_rows($result) < 1){
		echo ("<tr class='tr-cont'>
			   <td colspan='4'><center>No se encontraron resultados</center></td></tr>");
	}else{	
		/* Agrega los resultados */
		while($fila = mysql_fetch_array($result))
		{		
			$Lote = $fila['Lote'];	
			$Producto = $fila['Producto'];
			$Precio = $fila['Precio'];
			echo ("<tr class='tr-cont' id='".$id."' name='".$id."'>
				<td>".$Lote."</td>
				<td>".$Produco."</td>
				<td>".$Precio."</td>
				<td class='opc'><img src='../img/less.png'   onclick='eliminarCliente(\"".$id."\")' alt='Eliminar' title='Eliminar' class='clickable'/></td>
			</tr>");}
			
		}echo '</table>';
		/*$NroRegistros=mysql_num_rows($db->executeQuery($qry));
		$PagAnt=$PagAct-1;
		$PagSig=$PagAct+1;
		$PagUlt=$NroRegistros/$RegistrosAMostrar;
		$Res=$NroRegistros%$RegistrosAMostrar;
		if($Res>0) $PagUlt=floor($PagUlt)+1;
		echo '<div id="Paginacion">';
		echo "<a class='clickable' onclick=\"Pagina('1')\">Primero </a>";	
		if($PagAct>1) echo "<a class='clickable'  onclick=\"Pagina('$PagAnt')\"> Anterior</a>";
		echo "<strong> Pagina ".$PagAct."/".$PagUlt."</strong>";
		if($PagAct<$PagUlt)  echo " <a class='clickable'  onclick=\"Pagina('$PagSig')\"> Siguiente </a> ";
		echo "<a class='clickable'  onclick=\"Pagina('$PagUlt')\"> Ultimo</a>";
		echo "</div>";*/
	//}
	
	//inipag
			
?>
