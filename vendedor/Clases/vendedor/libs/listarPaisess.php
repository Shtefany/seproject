<?php 
	include("dt/DataConnection.class.php");
	$cn= new DataConnection();
	$qry = "SELECT * FROM cliente";
?>
 <script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
                        <th>RFC</th><!--Estado-->
                        <th>Nombre</th>
                        <th>Telefono</th><!--Estado-->
                        <th>E-mail</th>
                        <th>Direccion</th>
                         <th></th><!--Estado-->
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                       
                     
                    </tr>
                </tfoot>
                  <tbody>
                    <?php
                    $result = $cn->executeQuery($qry);	
                    if ( mysql_num_rows($result) < 1){
						echo ("<tr class='tr-cont'>
							<td colspan='3'>No se encontraron resultados</td>
							<td class='opc'></td>
							<td class='opc'></td>
						</tr>");
					}else{	
						/* Agrega los resultados */
						while($fila = mysql_fetch_array($result))
						{		
							$id = $fila['RFC'];	
							   $nombre = $fila['Nombre'];
							   $telefono = $fila['Telefono'];
							   $email = $fila['Email'];
            				   $direccion = $fila['Direccion'];
							   
                               echo '<tr>';
                               echo '<td >'.$id.'</td>';
                               echo '<td>'.$nombre.'</td>';
							   echo '<td >'.$telefono.'</td>';
                               echo '<td>'.$email.'</td>';
							   echo '<td>'.$direccion.'</td>';
                               echo "<td class='opc'><img src='../seproject/img/pencil.png' height=20px; width=20px; onclick='modificarEmpleado(\"".$id."\")' alt='Modificar' class='clickable'/></td>";
				               echo "<td class='opc'><img src='../seproject/img/less.png'   height=20px; width=20px; onclick='eliminarEmpleado(\"".$id."\")' alt='Eliminar' class='clickable'/></td>";
                               echo '</tr>';
                       }
                     }
     			                   
                    ?>
                <tbody>
            </table>
