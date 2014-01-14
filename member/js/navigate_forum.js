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


function submit_post()
{
	var cat=document.getElementById('category_text').value;
	var title=document.getElementById('entry_title_text').value;
	var content=document.getElementById('entry_text').value;

	if(cat.length<=0)
		{alert("Please select one category");  }
	else if(title.length<=0)
		{alert("Please give a title to your post");  }
	else if(content.length<=0)
		{alert("Please fill in the contents for the post");  }
	else
		{	
			var xml=new createAjaxObj();
			xml.open("GET",'submit_post.php?cat='+cat+'&title='+title+'&content='+content,true);
			xml.send();
			document.getElementById('make_entry_container').innerHTML="<span id='make_entry_response'>Your Post Has Been Submitted</span>";
		}
}











