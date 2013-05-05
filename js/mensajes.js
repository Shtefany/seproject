function openInbox() {
<<<<<<< HEAD
=======

>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
    document.getElementById("msgInbox").style.display = "block";
    document.getElementById("msgInbox").style.height  = window.innerHeight + "px";
    document.getElementById("msgInbox").style.width = window.innerWidth + "px";
    loadMessages();
<<<<<<< HEAD
=======

>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
}

function closeInbox() {
    document.getElementById("msgInbox").style.display = "none";
}

<<<<<<< HEAD
function loadMessagesArchived() {
    sendPetitionSync("../php/inbox.php?archivado=1","messages",document);
	document.getElementById("banner").innerHTML = "Mensajes archivados";
}

function loadMessages() {
    sendPetitionSync("../php/inbox.php?archivado=0","messages",document);
	document.getElementById("banner").innerHTML = "Bandeja de entrada";
}

function viewDetails(id){
	document.getElementById("details").style.display = "block";
    document.getElementById("details").style.height  = window.innerHeight + "px";
    document.getElementById("details").style.width = window.innerWidth + "px";
    loadDetails(id); 
	if ( document.getElementById("archivado").value == 1 ){
		document.getElementById("botonArchivar").innerHTML = "Regresar a bandeja de entrada";
	}else{
		document.getElementById("botonArchivar").innerHTML = "Archivar";
	}
}
function loadDetails(id){
	sendPetitionSync("../php/details.php?id=" + id,"msgDetail",document);
=======
function loadMessages() {
    sendPetitionSync("../php/inbox.php","messages",document);
}

function viewDetails(){
	document.getElementById("details").style.display = "block";
    document.getElementById("details").style.height  = window.innerHeight + "px";
    document.getElementById("details").style.width = window.innerWidth + "px";
    loadDetails(idMsg);
 
 
}
function loadDetails(){
	sendPetitionSync("../php/details.php","msgDetail",document);
>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
}

function closeDetails() {
    document.getElementById("details").style.display = "none";
<<<<<<< HEAD
}

function sendMsg(){
	document.getElementById("sendMessage").style.display = "block";
    document.getElementById("sendMessage").style.height  = window.innerHeight + "px";
    document.getElementById("sendMessage").style.width = window.innerWidth + "px";
    loadSender();
}
function loadSender(){
	sendPetitionSync("../php/sendMsg.php","msgSend",document);
}

function closeSend() {
    document.getElementById("sendMessage").style.display = "none";
}

function archivarMsg(){	
	id = document.getElementById("id").value;	
	if ( document.getElementById("archivado").value == 1 ){
		sendPetitionQuery("../php/archivaMensaje.php?id=" + id + "&reverse=true"); // Desarchivar
	}else{
		sendPetitionQuery("../php/archivaMensaje.php?id=" + id); // Archivar
	}	
	if ( returnedValue == "OK" ){
		alert("Operacion realizada correctamente");
		closeDetails();
		loadMessages();
	}else{
		alert("Error desconocido :(");
	}	
}

function sendMessage(){
	qry = "enviarMensaje.php?";
	qry += "asunto=" + document.getElementById("asunto").value + "&";
	qry += "area=" + document.getElementById("area").value + "&";
	qry += "mensaje=" + document.getElementById("mensaje").value + "&";
	qry += "problema=" + document.getElementById("problema").checked;
	sendPetitionQuery("../php/" + qry);
	if ( returnedValue == "OK" ){
		alert("Mensaje enviado");
		closeSend();
		loadMessages();
	}else{
		alert("Error desconocido :(");
	}	
=======

>>>>>>> c522b9af95acb3c0ac9c3e9af9ee9206fa090ab4
}