function openInbox() {

    document.getElementById("msgInbox").style.display = "block";
    document.getElementById("msgInbox").style.height  = window.innerHeight + "px";
    document.getElementById("msgInbox").style.width = window.innerWidth + "px";
    loadMessages();

}

function closeInbox() {
    document.getElementById("msgInbox").style.display = "none";
}

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
}

function closeDetails() {
    document.getElementById("details").style.display = "none";

}