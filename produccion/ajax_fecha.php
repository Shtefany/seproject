<?php
	include_once("config.php");

	if(isset($_POST["fecha"])){ 

		$contentToSave = $_POST["fecha"];
	
		$sql = "SELECT * FROM pedido WHERE fechaSolicitud = '$contentToSave' and estado = 'cambio';";
		//header('HTTP/1.1 500 $sql');
		if($datos = mysql_query($sql)){
			$rows = mysql_num_rows($datos);
			//echo "La consulta tiene " . $rows . " filas . . .";			
			$codigo = '';
			$codigo .= "<table id='table-content'>";
			$codigo .= "<tr class='tr-header'>";
			$codigo .= '<th>Identificador de Pedido</th>';		
			$codigo .= '<th>Fecha de Solicitud</th>';
			$codigo .= '<th>Fecha de Entrega</th>';
			$codigo .= '<th>Estado</th>';						
			$codigo .= '</tr>';					
			if($rows > 0){
				//echo '<p>Consulta Correcta</p>';
				while($fila = @mysql_fetch_array($datos)){
					$codigo .= "<tr class='tr-cont'>";
		$codigo .= "<td>{$fila['idpedido']}</td>";
		$codigo .= "<td>{$fila['fechaSolicitud']}</td>";
		$codigo .= "<td>{$fila['fechaEntrega']}</td>"; 
		$codigo .= "<td>{$fila['estado']}</td>";
					$codigo .= "</tr>";
				}				
				$codigo .= '</table>';
				echo $codigo;
	
	
		

								
				
			}
			else{
				echo "<p>No se encontraron resultados . . .</p>";							
			}
			mysql_close($connecDB);
		}
		else{

			header('HTTP/1.1 500 ERROR SQL!, No se puede completar la busqueda . . .');

		}
	}
	else{
		//Output error
		header('HTTP/1.1 500 Error occurred, Could not process request!');
    	exit();
	}
?>