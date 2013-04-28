<?php
if ( !defined("__ARTICULOV__") ){
	define("__ARTICULOV__","");
	include("DataConnection.class.php");
	
	class ArticuloV{
		private $Folio;
		private $idLote;
		private $Estado;
		
		public function __construct($folio,$idlote,$estado)
		{
			$this->Folio = $folio;
			$this->idLote = $idlote;
			$this->Estado = $estado;		
		}
		
		public function getFolio(){
			return $this->Folio;
		}
		public function getidLote(){
			return $this->idLote;
		}
		public function getEstado(){
			return $this->Estado;
		}
	
		public static function Agregar($folio,$producto,$idlote){
			$db = new DataConnection();
			if ($idlote=0){
				$result = $db->executeQuery("insert into Lote(idProducto,Estado) values (".$producto.",'Pendiente') ");
				$idLote=mysql_insert_id();
			}
			$qry = "INSERT INTO ArticuloV (Folio, idLote) VALUES(".$folio.",".$idlote.");";
			if($result = $db->executeQuery($qry))
			{
				return true;
			}
			return false;
		}
		
		public static function Modificar($folio,$idlote,$estado){
			$db = new DataConnection();
			$qry = "UPDATE ArticuloV SET Folio=".$folio.", idLote=".$idlote." , Estado='".$estado."' WHERE idLote='".$idlote."'";
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}
		
		public static function findById($id)
		{
			$db = new DataConnection();			
			$result = $db->executeQuery("SELECT * FROM ArticuloV WHERE Folio='".$id."'");
			if ($dato = mysql_fetch_assoc($result)){
				$clie = new ArticuloV($dato["Folio"],$dato["idLote"],$dato["Estado"]);
				return $clie;
			}	
			return false;
		}
				
		public static function Eliminar($id){
			$db = new DataConnection();			
			$qry = "DELETE FROM ArticuloV WHERE idLote='".$id."'";
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}
		/*public static function Recuperar($id){
			$db = new DataConnection();			
			$qry = "UPDATE Cliente SET Estado=NULL WHERE RFC='".$id."'";
			if($result = $db->executeQuery($qry))
				return true;
			return false;
		}	*/
	}
}
?>
