<?php
if ( !defined("__VALIDATIONS__") ){
	define("__VALIDATIONS__","");

	class Validations{
		
		public static function cleanString($string){
			return filter_var($string, FILTER_SANITIZE_STRING);
		}
		
		public static function validaRFC($string){
			$valor = str_replace("-", "", $string); 
			$cuartoValor = substr($valor, 3, 1); 
			if (ctype_digit($cuartoValor) && strlen($valor) == 12) { // Caso de personas morales
				$letras = substr($valor, 0, 3); 
				$numeros = substr($valor, 3, 6); 
				$homoclave = substr($valor, 9, 3); 
				if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) { 
					return true; 
				} 
			} else if (ctype_alpha($cuartoValor) && strlen($valor) == 13) { // Caso de personas fisicas
				$letras = substr($valor, 0, 4); 
				$numeros = substr($valor, 4, 6); 
				$homoclave = substr($valor, 10, 3); 
				if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) { 
					return true; 
				} 
			}else { 
				return false; 
			} 
		} 
		
		public static function validaCURP($string){
			
		}
		
		public static function validaEmail($string){
			return filter_var($string, FILTER_VALIDATE_EMAIL);  
		}
		
		public static function validaNombre($string){
			return preg_match("/^[ΑΙΝΣΪαινσϊA-Za-z ]+$/" , $string ) ? true: false;
		}
		
	}
}
?>