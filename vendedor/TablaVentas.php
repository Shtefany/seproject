<table id='table-content'>
<<<<<<< HEAD
	<tr class='tr-headerv'>
=======
	<tr class='tr-header'>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
		<th>Folio</th>
		<th>RFC</th>
		<th>Fecha de Realizaci&oacute;n</th>
		<th>Fecha de Entrega</td>
<<<<<<< HEAD
		<th colspan='2'> </th>
=======
		<th class='opc'> </th>
		<th class='opc'> </th>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
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
<<<<<<< HEAD
		echo ("<tr class='tr-contv'>
=======
		echo ("<tr class='tr-cont'>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
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
<<<<<<< HEAD
			echo ("<tr class='tr-contv' id='".$id."' name='".$id."'>
=======
			echo ("<tr class='tr-cont' id='".$id."' name='".$id."'>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
				<td>".$id."</td>
				<td>".$RFC."</td>
				<td>".$fecha."</td>
				<td>".$fentrega."</td>
<<<<<<< HEAD
				<td ><img src='../img/pencil.png' onclick='modificarVenta(\"".$id."\")' alt='Modificar' title='Modificar' class='clickable'/></td>
				<td ><img src='../img/less.png'   onclick='cancelarVenta(\"".$id."\")' alt='Eliminar' title='Cancelar' class='clickable'/></td>
			</tr>");}
			else{echo ("<tr class='tr-contv' id='".$id."' name='".$id."'>
=======
				<td class='opc'><img src='../img/pencil.png' onclick='modificarVenta(\"".$id."\")' alt='Modificar' title='Modificar' class='clickable'/></td>
				<td class='opc'><img src='../img/less.png'   onclick='cancelarVenta(\"".$id."\")' alt='Eliminar' title='Cancelar' class='clickable'/></td>
			</tr>");}
			else{echo ("<tr class='tr-cont' id='".$id."' name='".$id."'>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
				<td>".$id."</td>
				<td>".$RFC."</td>
				<td>".$fecha."</td>
				<td>".$fentrega."</td>
<<<<<<< HEAD
				<td colspan='2'><img src='../img/cancelar.png' alt='Cancelar' title='Cancelado'/></td>
=======
				<td colspan='2' class='opc'><img src='../img/cancelar.png' alt='Cancelar' title='Cancelado'/></td>
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
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
<<<<<<< HEAD
		echo "<u><a class='click' onclick=\"PaginaV('1')\">Primero </a></u>";	
		if($PagAct>1) echo "&nbsp;<u><a class='click'  onclick=\"PaginaV('$PagAnt')\"> Anterior</a></u>";
		echo "&nbsp;<strong> Pagina ".$PagAct."/".$PagUlt."</strong>";
		if($PagAct<$PagUlt)  echo "&nbsp;<u> <a class='click'  onclick=\"PaginaV('$PagSig')\"> Siguiente </a> </u>";
		echo "&nbsp;<u><a class='click'  onclick=\"PaginaV('$PagUlt')\"> Ultimo</a></u>";
=======
		echo "<a class='clickable' onclick=\"PaginaV('1')\">Primero </a>";	
		if($PagAct>1) echo "<a class='clickable'  onclick=\"PaginaV('$PagAnt')\"> Anterior</a>";
		echo "<strong> Pagina ".$PagAct."/".$PagUlt."</strong>";
		if($PagAct<$PagUlt)  echo " <a class='clickable'  onclick=\"PaginaV('$PagSig')\"> Siguiente </a> ";
		echo "<a class='clickable'  onclick=\"PaginaV('$PagUlt')\"> Ultimo</a>";
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
		echo "</div>";
	}
		
?>