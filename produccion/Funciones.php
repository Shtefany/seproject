<?php
	//header('Content-Type: text/html; charset=UTF-8'); 
	include('conexion.php');	
?>
<?php
	function generarTablaLotes(){

		$codigo = '';
		//$codigo .= '<table>';
		$consulta = "SELECT * FROM Lote";
		//echo '<p>' . $consulta . '</p>';
		$paquete = ejecutarConsulta($consulta);
		//echo '<p>' . $paquete . '</p>';
		
		while($fila = @mysql_fetch_array($paquete)){
			echo '<tr  class="tr-cont">';
			echo '<td>' . $fila["idLote"] . '</td>';
			echo '<td>' . $fila["productoAsociado"] . '</td>';	
			echo '<td>' . $fila["lineaProduccion"] . '</td>';	
			echo '<td>' . $fila["fechaElaboracion"] . '</td>';	
			echo '<td><a href="ModificarLote.php?nolote=' . $fila["idLote"] . '">
			<img src="../img/pencil.png"></img></a></td>';
			echo '<td><a href="EliminarLote.php?nolote=' . $fila["idLote"] . '">
			<img src="../img/less.png"></img></a></td>';			
			echo '</tr>';			
		}
		
		//$codigo .= '</table>';
		
	}
	
	function ejecutarConsulta($query){
		if(!$datos = mysql_query($query)){
			return false;
		}
		else{
			return $datos;
		}
	}
	
	function modificarLote($datos){
		if($fila = mysql_fetch_array($datos)){
			$productoActual = $fila["productoAsociado"];
			$lineaActual = $fila["lineaProduccion"];
			$elaboracionActual = $fila["fechaElaboracion"];
			$caducidadActual = $fila["fechaCaducidad"];
			$idLoteActual = $fila["idLote"];
			
			$lineaX = obtenerLinea($lineaActual);
			$codigo = '';
			//$codigo .= '<form action="lotemodificado.php" method="post">';
			/*
							<p>
					<input type="text" id="nolote" name="nolote" 
					value="' . $idLoteActual . '" disabled="disabled"/>
				</p>*/
			$codigo .= '<div id="modificar">';
			//$codigo .= '<h4>Ahora puede modificar los datos de este Lote</h4>';
			//$codigo .= '*****No de Lote: ' . $idLoteActual . '*****';
				$redireccion = 'redireccion';			
			$codigo .='
				<p>
					<label>
						Nombre del Producto Asociado:
					</label>
				</p>
				<p>
					<input type="text" id="nombreProducto" name="nombreProducto" value="'.$productoActual.'"/>
				</p>
                <div id="validarProducto"></div>    				
				<p>
					<label>
					Línea de Producción Asociada:
					</label>
				</p>
				<p>
					<input type="text" id="lineaProduccion" name="lineaProduccion" 
					disabled="disabled" value="' . $lineaX . '" />				
				</p>
                <div id="validarLinea"></div>    						
				<p>
					<label>
						Seleccionar la fecha de elaboración:
					</label>
				</p>	
                <p>
					<input type="text" id="from" name="from" value="' . $elaboracionActual . '"/>
				</p>			
				<p>
					<label>
						Seleccionar la fecha de caducidad:
					</label>
				</p>						
				<p>
					<input type="text" name="to" id="to" value="'.$caducidadActual . '" />				
				</p>
				<input name="nolote" type="hidden" value="'.$idLoteActual.'" id="nolote" />
                <input type="submit" value="Modicar Lote" class="botonform" 
				onclick="modificarLote();" />
				<a href="GestionarLotes.php">Cancelar</a>';


			$codigo .= '</div>'; 	
			$codigo .= '<div id="proceso"></div><table id="data" style="display:none;"></table>';						
			//</form>';
		/*
								<select name="lineaProduccion">
							<option value="0">Elegir una línea de producción</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>														
						</select>*/
		}
		else{
			$codigo = 'false';
		}
		
		return $codigo;
	}
	
	function actualizarLote($nolote, $producto, $linea, $elab, $caducidad){ 
		$consulta = "UPDATE Lote SET productoAsociado = '$producto', lineaProduccion = '$linea',
		fechaElaboracion = '$elab', fechaCaducidad = '$caducidad'
		WHERE idLote = '$nolote'";
		//echo $consulta;
		
		if(ejecutarConsulta($consulta)){
			echo '<p>Registro Actualizado</p>';
		}
		else{
			echo '<p>No se pudo actualizar el lote</p>';
		}
	}
	
	function eliminarLote($nolote){
		$consulta = "DELETE FROM Lote WHERE idLote = '$nolote';";
		if(ejecutarConsulta($consulta)){
			echo "<h2>El Lote #$nolote ha sido eliminado exitosamente.</h2>";
		}
		else{
			echo '<p>No se pudo eliminar el registro</p>';			
		}
	}
	
	function obtenerProductos(){
		$consulta = "SELECT * FROM Producto";
		$datos = ejecutarConsulta($consulta);
		while($fila = @mysql_fetch_array($datos)){
			echo '<option value="' . $fila["idProducto"] . '">' . $fila["nombreProducto"] . '</option>';
		}
	}
	
	function obtenerLineas(){
		$consulta = "SELECT * FROM lineaProduccion";
		$datos = ejecutarConsulta($consulta);
		while($fila = @mysql_fetch_array($datos)){
			echo '<option value="' . $fila["id"] . '">' . $fila["nombreLinea"] . '</option>';
		}		
	}
	
	function obtenerIngredientes(){
		$consulta = "SELECT * FROM ingrediente";
		$datos = ejecutarConsulta($consulta);
		while($fila = @mysql_fetch_array($datos)){
			echo '<option value="' . $fila["idingrediente"] . '">' . $fila["nombre"] . '</option>';
		}		
	}	
	
	function obtenerLinea($id){
		$nombre = '';
		$sql = "SELECT * FROM lineaProduccion WHERE id = '$id'";
		$datos = ejecutarConsulta($sql);
		while($fila = @mysql_fetch_array($datos)){
			$nombre = $fila["nombreLinea"];
		}
		return $nombre;
	}
	
	function obtenerIdLinea($nombre){
		$nom = '';
		$sql = "SELECT * FROM lineaproduccion WHERE nombreLinea = '$nombre';";
		$datos = ejecutarConsulta($sql);
		while($fila = @mysql_fetch_array($datos)){
			$nom = $fila["id"];
		}
		return $nom;
	}
	
	function obtenerProducto($id){
		$producto = '';
		$sql = "SELECT * FROM Producto WHERE idProducto = '$id'";
		
		$datos = ejecutarConsulta($sql);
		while($fila = mysql_fetch_array($datos)){
			$producto = $fila["nombreProducto"];
		}
		//echo $producto;
		return $producto;

	}
	
	function obtenerProveedor($id){
		$nombre = '';
		$sql = "SELECT * FROM proveedor WHERE RFC = '$id';";
		$datos = ejecutarConsulta($sql);
		while($fila = @mysql_fetch_array($datos)){
			$nombre = $fila["Nombre"];
		}
		return $nombre;
	}
	
	function obtenerPendientes(){
		$codigo = '';
		//Cambiar por pedido c/estado
		$sql = "SELECT * FROM pedido WHERE estado = 'pendiente';";
		$paquete = ejecutarConsulta($sql);
		
		$codigo .= "<table id='table-content'>";
		$codigo .= "<tr class='tr-header'>";
		$codigo .= '<th>Identificador de Pedido</th>';		
		$codigo .= '<th>Fecha de Solicitud</th>';
		$codigo .= '<th>Fecha de Entrega</th>';
		$codigo .= '<th>Estado</th>';						
		$codigo .= '</tr>';		
		
		while($fila = @mysql_fetch_array($paquete)){
		$codigo .= "<tr class='tr-cont'>";
		$codigo .= "<td>{$fila['idpedido']}</td>";
		$codigo .= "<td>{$fila['fechaSolicitud']}</td>";
		$codigo .= "<td>{$fila['fechaEntrega']}</td>"; 
		$codigo .= "<td>{$fila['estado']}</td>";
		$codigo .= "</tr>";		
			
		}
		$codigo .= '</table>';		
		return $codigo;

	}

?>
