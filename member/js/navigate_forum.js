function createAjaxObj()
{
	if(window.XMLHttpRequest)
		return new XMLHttpRequest();
	else
		return new ActiveXObject("Microsoft.XMLHTTP");
}


function loadMenu()
{
	var xml=createAjaxObj();
	xml.open("GET","./menu.php",true);
	xml.send();
	xml.onreadystatechange=function()
	{
		if(xml.readyState==4 && xml.status==200)
		{document.getElementById('forum_container').innerHTML=xml.responseText;}
	}	
}

function menuClick(menuop)
{
	var xml=createAjaxObj();
	xml.open("GET","./"+menuop+".php",true);
	xml.send();
	xml.onreadystatechange=function()
	{
		if(xml.readyState==4 && xml.status==200)
		{document.getElementById('forum_container').innerHTML=xml.responseText;}
	}
}












