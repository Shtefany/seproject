<?php

	include('Funciones.php');
	include('DatosConexion.php');

	class Almacen{
		//Variables de la clase
		private $estado;
		
		function __construct(){
			$estado = 'vacio';
		}
		
		function consultarEstadoAlmacen(){
			$codigo = '';
			include('DatosConexion.php');			
			if ( conectarBase($host,$usuario,$clave,$base) ){
				//echo "<h1>Conexión establecida correctamente</h1>";
				$consulta = "SELECT estado FROM Almacen WHERE fecha_registro < NOW()
				ORDER BY fecha_registro DESC LIMIT 0, 1;";
				//echo $consulta;
				
				$registro = ejecutarConsulta($consulta);
				//echo $registro;
				$codigo = $this->procesarEstadoAlmacen($registro);
				return $codigo;
			} else {
				echo "<p>Servicio interrumpido</p>";
			}			
		}
		
		function procesarEstadoAlmacen($registro){
		
			$fila = @mysql_fetch_array($registro);
			$estado = utf8_encode($fila["estado"]);
		
			$codigo = 'alert("';
		
			if($estado == 'vacio' or $estado == 'medio'){
				//$codigo .= 'Hay disponibilidad';
				$codigo .= 'El almacén tiene disponibilidad para agregar productos';
			}
			elseif($estado == 'lleno'){
				//$codigo .= 'Esta lleno';
				$codigo .= 'El almacén NO tiene disponibilidad para agregar productos';			
			}
			else{
				$codigo .= 'Validar Fecha';
			}

			$codigo .= '");';
			return $codigo;
		}				
		
	}
		
?>