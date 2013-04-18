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