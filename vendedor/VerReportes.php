<?php include("../php/AccessControl.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="author" content="Ventas"/>
        <title>Ver Reporte</title>
        <link rel="stylesheet" type="text/css" href="../css/ventastyle/styleVR.css" />
        <?php include('scripts.php'); ?> 
        <?php
			include("crear.php");
			include("../php/DataConnection.class.php");
					
			$arrayMeses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$dia = date("d");
			$mes = (int)date("m");
			$anio = date("Y");			
			$fechaActual ="Hoy";  //Inicializar (Prevencion de errores)									
			$fechaActual = $dia." de ".$arrayMeses[$mes-1]." de ".$anio;			
			
			$fechaInicio=$_POST["from"];
			$fechaFin = $_POST["to"];
			
			///Cambiar formato de fechas a SQL
			$valoresPrimera = explode ("/", $fechaInicio);   
			$valoresSegunda = explode ("/", $fechaFin); 
	
			$diaPrimera    = $valoresPrimera[0];  
			$mesPrimera  = $valoresPrimera[1];  
			$anyoPrimera   = $valoresPrimera[2]; 
			$diaSegunda   = $valoresSegunda[0];  
			$mesSegunda = $valoresSegunda[1];  
			$anyoSegunda  = $valoresSegunda[2];
			$fechaInicioSQL=$anyoPrimera."-".$mesPrimera."-".$diaPrimera;
			$fechaFinSQL=$anyoSegunda."-".$mesSegunda."-".$diaSegunda;
			
			$Cliente = $_POST["cliente"];
			//echo $Cliente;
			$Producto = $_POST["producto"];
			echo $Producto;
			
			$db = new DataConnection();	
			
			if($Cliente!='0' && $Producto=='0'){//Por Cliente
			
				$qry = "SELECT * FROM Venta V, Cliente C WHERE C.RFC='$Cliente' and V.RFC='$Cliente' and V.Fecha between '$fechaInicioSQL' and '$fechaFinSQL'";
				
					
				}
            if($Cliente=='0' && $Producto!='0'){//Por Producto
			
				$qry = "SELECT distinct(V.folio),V.RFC,V.Fecha,V.Fentrega,V.estado FROM Venta V, Producto P, lote L, articuloventa A WHERE P.idProducto=".$Producto." and L.idproducto=".$Producto." and A.idlote=L.numlote and A.folio=V.folio and  V.Fecha between '".$fechaInicioSQL."' and '".$fechaFinSQL."' Group By V.Folio";
					
				}
            if($Cliente=='0' && $Producto=='0'){//Todos
			    $qry = "SELECT * FROM Venta where Fecha between '$fechaInicioSQL' and '$fechaFinSQL'";
				
			}
			if($Cliente!='0' && $Producto!='0'){//Por Cliente y producto
			   $qry = "SELECT distinct(V.folio),V.RFC,V.Fecha,V.Fentrega,V.estado FROM Venta V, Cliente C, Producto P, lote L, articuloventa A WHERE C.RFC='$Cliente' and V.RFC='$Cliente' and P.idProducto='$Producto' and L.idproducto='$Producto' and A.idlote=L.numlote and A.folio=V.folio and  V.Fecha between '$fechaInicioSQL' and '$fechaFinSQL' Group By V.Folio";
				
			}
			
	
			$result = $db->executeQuery($qry);
			if (!$result) 
				die ("Database access failed: " . mysql_error());
		    $rows = mysql_num_rows($result);
			                
			                //obtener el nomnbre del cliente
							$qryc = "SELECT Nombre FROM Cliente WHERE RFC='$Cliente'";
							$resultc = $db->executeQuery($qryc);
							if (!$resultc) 
								die ("Database access failed: " . mysql_error());
							$rowc = mysql_fetch_row($resultc);
							//
							
			//Creacion del PDF
			$pdf=new PDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','bi',14);
			$pdf->Cell(40,10,'',0,1); //Linea vacia
			$pdf->Cell(80,6,'Cookies & System S.A. De C.V.',0,1,'L');
			$pdf->Cell(80,6,'Mexico, D.F.',0,1,'L');
			$pdf->Cell(80,6,$fechaActual,0,1,'L');
			$pdf->Cell(40,10,'',0,1); //Linea vacia
			$pdf->SetFont('Arial','b',14);
			if($Producto=='0' && $Cliente=='0'){
			$pdf->Cell(80,6,'Reporte de todas las Ventas',0,1,'L');
			}
			else{
				if($Cliente!='0'){$pdf->Cell(80,6,'Reporte de Ventas Del Cliente: ' .$rowc[0],0,1,'L');}
                else{$pdf->Cell(80,6,'Reporte de Ventas ',0,1,'L');}
				
			}
			$pdf->SetFont('Arial','',13);
			$pdf->Cell(40,4,'',0,1); //Linea vacia
			$pdf->Cell(120,6,'Periodo:    De    '.$fechaInicio.'    A    '.$fechaFin,0,1,'L');
			$pdf->Cell(40,6,'',0,1); //Linea vacia
				
			//Lenado de las tablas		
			for ($j = 0 ; $j < $rows ; ++$j)
			{
				$row = mysql_fetch_row($result);
				//Cabeceras Principales
				$pdf->SetFont('Arial','b',11);
				$pdf->Cell(20,5,'Folio',1,0,'L',0);
				$pdf->Cell(50,5,'RFC',1,0,'L',0);					
				$pdf->Cell(30,5,'Fecha Elab.',1,0,'L',0);			
				$pdf->Cell(30,5,'Fecha Ent.',1,0,'L',0);
				$pdf->Cell(30,5,'Estado.',1,1,'L',0);
				$pdf->SetFont('Arial','',11);
				//Tuplas
				$pdf->Cell(20,5,$row[0],1,0,'L',0);
				$pdf->Cell(50,5,$row[1],1,0,'L',0);
				$pdf->Cell(30,5,$row[2],1,0,'L',0);
				$pdf->Cell(30,5,$row[3],1,0,'L',0);	
				$pdf->Cell(30,5,$row[4],1,0,'L',0);	
				$pdf->Ln();	
				//Cabeceras de Articulos
				$pdf->SetFont('Arial','b',11);
				$pdf->Cell(90,5,'Producto',1,0,'L',0);
				$pdf->Cell(30,5,'NumLote',1,0,'L',0);					
				$pdf->Cell(40,5,'Precio Unitario.',1,0,'L',0);
				$pdf->SetFont('Arial','',11);
				$pdf->Ln();	
				//$qry1 = "SELECT numlote,idProducto FROM Lote WHERE idProducto='$row[0]'";
				
				$qry1 = "SELECT P.Nombre, L.numlote, P.Precio,A.Estado FROM articuloventa A, producto P, lote L, venta V WHERE V.Folio='$row[0]' and A.Folio='$row[0]' and A.idlote=L.numlote and L.idProducto=P.idProducto";
				
				$result1 = $db->executeQuery($qry1);
				if (!$result1) 
				die ("Database access failed: " . mysql_error());
				$rows1 = mysql_num_rows($result1);
				for ($i = 0 ; $i < $rows1 ; ++$i){
					$row1 = mysql_fetch_row($result1);
					
					//Tuplas
					$pdf->Cell(90,5,$row1[0],1,0,'L',0);
					$pdf->Cell(30,5,$row1[1],1,0,'L',0);
					$pdf->Cell(40,5,$row1[2],1,0,'L',0);			
					$pdf->Ln();	
					
					
				}
				$pdf->Cell(40,10,'',0,1);//linea en blanco						
		
			}			
			
			$pdf->Output("reporte.pdf","F");
			
		?>		
        	
    </head>    
    <body>
    	 
	<!-- El header es el mismo para todas las paginas-->
    	
       <?php include('header.php');?> 
        <div id="mainDiv">
		<!-- Aquí se coloca el menú -->
           <?php include('Menu.php');?> 
			<!-- Divisor del contenido de la pagina -->
            <div id="content">
				
                
              <div id="VR">
              	<object data="reporte.pdf" type="application/pdf" width="800" height="450">	</object>
			  </div>	
                	
                </div>
                <div id="aceptar" class="form-button" onClick="window.location ='Reportes.php'"><center>Aceptar</center></div>
				
                
            </div>
			
    </body>   
</html>