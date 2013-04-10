var peticion;
var target;
var doc;
var returnedValue;

function procesarPeticionQuery()
{
	if(peticion.readyState==4)
	{
		if(peticion.status==200)
		{
			returnedValue = peticion.responseText;
		}
	}
}

function procesarPeticion()
{
	if(peticion.readyState==4)
	{
		if(peticion.status==200)
		{
			doc.getElementById(target).innerHTML = peticion.responseText;
		}
	}
}

function obtenerXHR()
{
	req = false;
	if ( window.XMLHttpRequest)
	{
		req = new XMLHttpRequest();
		return req;
	}
	else
	{
		if ( ActiveXObject)
		{
			var vectorVersiones = ["MSXML2.XMLHttp.5.0","MSXML2.XMLHttp.4.0","MSXML2.XMLHttp.3.0","MSXML2.XMLHttp","Microsoft.XMLHttp"];
			for(var i=0;i<vectorVersiones.length ; i++)
			{
				try
				{
					req = new ActiveXObject(vectorVersiones[i]);
					return req;
				}
				catch(e){}
			}			
		}
	}
	return false;
}

function sendPetitionSync(url,targetT,docT)
{
	peticion = obtenerXHR();
	if ( peticion ){
		target = targetT;
		doc = docT;
		peticion.open("GET",url,false);
		peticion.onreadystatechange = procesarPeticion;
		peticion.send(null);
		return true;
	}
	return false;
}

function sendPetitionQuery(url){
	peticion = obtenerXHR();
	if ( peticion ){
		peticion.open("GET",url,false);
		peticion.onreadystatechange = procesarPeticionQuery;
		peticion.send(null);
		return true;
	}
	return false;
}