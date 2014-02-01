function createAjaxObj()
{
	if(window.XMLHttpRequest)
		return new XMLHttpRequest();
	else
		return new ActiveXObject("Microsoft.XMLHTTP");
}

// $("#field_text").change(function(){

// 	var fld=$("#field_text").value;
// 	alert(fld);
// 	if (fld!='')
// 	{
// 		xml=createAjaxObj();
// 		xml.open('get',"./edit_show.php?fld="+fld,true);
// 		xml.send();
// 		xml.onreadystatechange=function()
// 		{
// 			if(xml.readyState==4 && xml.status==200)
// 				{$('#value_text').value=xml.responseText;}
// 		}
// 	}
// });

function change()
{
	var fld=document.forms['edit_form'].elements['field'].value;
	var vlu=document.forms['edit_form'].elements['value'].value;
	var submit_change=document.forms['edit_form'].elements['submit_change'].value;

	xml=createAjaxObj();
	fld=encodeURIComponent(fld);
	vlu=encodeURIComponent(vlu);
	submit_change=encodeURIComponent(submit_change);
	xml.open("get","./edit_show.php?fld="+fld+"&vlu="+vlu+"&submit_change="+submit_change,true);
	xml.send();
	alert("The selected value has beend changed");
	return false;
}
