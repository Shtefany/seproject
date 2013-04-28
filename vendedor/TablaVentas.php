<table id='table-content'>
	<tr class='tr-header'>
		<th>Folio</th>
		<th>RFC</th>
		<th>Fecha de Realizaci&oacute;n</th>
		<th>Fecha de Entrega</td>
		<th class='opc'> </th>
		<th class='opc'> </th>
	</tr>
<?php
	include("../php/DataConnection.class.php");
	include("../php/validations.class.php");
	//Inpaginacion
    $RegistrosAMostrar=5;
	if(isset($_GET['pag'])){
		$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
		$PagAct=$_GET['pag'];}
	else{
		$RegistrosAEmpezar=0;
		$PagAct=1;}	
    //finpaginacion
	$db = new DataConnection();	
	$qry= "SELECT * FROM Venta";
	if ( isset($_GET["search"] ) ){
		$filtro = Validations::cleanString($_GET["search"]); // Limpia la entrada
		$qry.= " WHERE Folio LIKE '%".$filtro."%' OR RFC LIKE '%".$filtro."%'";
	}
	$ry= $qry." ORDER BY Folio LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
	
	// A�ade parametros de b�squeda
	$result = $db->executeQuery($ry);	
	if ( mysql_num_rows($result) < 1){
		echo ("<tr class='tr-cont'>
			   <td colspan='6'><center>No se encontraron resultados</center></td></tr>");
	}else{	
		/* Agrega los resultados */
		while($fila = mysql_fetch_array($result))
		{		
			$id = $fila['Folio'];	
			$RFC = $fila['RFC'];
			$fecha = $fila['Fecha'];
			$fentrega = $fila['Fentrega'];
			$estado = $fila['Estado'];
			if($estado!="Cancelada")
			{
			echo ("<tr class='tr-cont' id='".$id."' name='".$id."'>
				<td>".$id."</td>
				<td>".$RFC."</td>
				<td>".$fecha."</td>
				<td>".$fentrega."</td>
				<td class='opc'><img src='../img/pencil.png' onclick='modificarVenta(\"".$id."\")' alt='Modificar' title='Modificar' class='clickable'/></td>
				<td class='opc'><img src='../img/less.png'   onclick='cancelarVenta(\"".$id."\")' alt='Eliminar' title='Cancelar' class='clickable'/></td>
			</tr>");}
			else{echo ("<tr class='tr-cont' id='".$id."' name='".$id."'>
				<td>".$id."</td>
				<td>".$RFC."</td>
				<td>".$fecha."</td>
				<td>".$fentrega."</td>
				<td colspan='2' class='opc'><img src='../img/cancelar.png' alt='Cancelar' title='Cancelado'/></td>
				</tr>");}
		}
		echo '</table>';
	//inipag
		$NroRegistros=mysql_num_rows($db->executeQuery($qry));
		$PagAnt=$PagAct-1;
		$PagSig=$PagAct+1;
		$PagUlt=$NroRegistros/$RegistrosAMostrar;
		$Res=$NroRegistros%$RegistrosAMostrar;
		if($Res>0) $PagUlt=floor($PagUlt)+1;
		echo '<div id="Paginacion">';
		echo "<a class='clickable' onclick=\"PaginaV('1')\">Primero </a>";	
		if($PagAct>1) echo "<a class='clickable'  onclick=\"PaginaV('$PagAnt')\"> Anterior</a>";
		echo "<strong> Pagina ".$PagAct."/".$PagUlt."</strong>";
		if($PagAct<$PagUlt)  echo " <a class='clickable'  onclick=\"PaginaV('$PagSig')\"> Siguiente </a> ";
		echo "<a class='clickable'  onclick=\"PaginaV('$PagUlt')\"> Ultimo</a>";
		echo "</div>";
	}
		
?>