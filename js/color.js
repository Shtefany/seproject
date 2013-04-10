function setColors(doc, mainColor, secondColor, thirdColor) {
    doc.getElementById("header").style.backgroundColor = mainColor;
    doc.getElementById("all-content").style.backgroundColor = mainColor;
    changeColorElements(doc.getElementsByClassName("button"), mainColor);
    changeColorElements(doc.getElementsByClassName("form-button"), thirdColor);
    changeColorElements(doc.getElementsByClassName("opc"), mainColor);
	changeColorElements(doc.getElementsByClassName("selected-button"), secondColor);
	changeColorElements(doc.getElementsByClassName("tr-header"), secondColor);
}

function changeColorElements(array,color) {
    for (i = 0; i < array.length; i++) {
        array[i].style.backgroundColor = color;
    }    
}