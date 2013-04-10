function validarCurp(curp){
	curp=curp.toUpperCase().trim();
	var re = /[A-Z]{4}[0-9]{6}[H,M][A-Z]{5}[A-Z0-9]{1}[0-9]{1}/;
	return re.exec(curp);
}