function createAjaxObj()
{
	if(window.XMLHttpRequest)
		return new XMLHttpRequest();
	else
		return new ActiveXObject("Microsoft.XMLHTTP");
}
function detVerify()
{
	var reg_no=document.forms['register_form'].elements['reg_no'].value;
	var user1=document.forms['register_form'].elements['user1'].value;
	var user2=document.forms['register_form'].elements['user2'].value;
	var email=document.forms['register_form'].elements['email'].value;
	var name=document.forms['register_form'].elements['name'].value;
	var year=document.forms['register_form'].elements['year'].value;
	var section=document.forms['register_form'].elements['section'].value;
	var number=document.forms['register_form'].elements['number'].value;

	if(reg_no.length<=0 || user1.length<=0 || user2.length<=0 || email.length<=0 || name.length<=0 || year.length<=0 || section.length<=0 || number.length<=0)
		{document.getElementById('fill_error').innerHTML='Fill all the fields marked with *'; return false;}
	else if(reg_no.length!=10)
		{document.getElementById('fill_error').innerHTML='Enter a valid registration number'; return false;}
	else if(reg_no.slice(0,4)!='1081')
		{document.getElementById('fill_error').innerHTML='This website allows registration for IT students only'; return false;}
	else if(user1!=user2)
		{document.getElementById('fill_error').innerHTML='Both passwords do not match with each other'; return false;}
	else if(!(valid_email(email)))
		{document.getElementById('fill_error').innerHTML='Enter a valid E-Mail Address'; return false;}
	else if(number.length!=10)
		{document.getElementById('fill_error').innerHTML='Enter a valid mobile number'; return false;}
	else			//{return true;}
		{
			var hometown=document.forms['register_form'].elements['hometown'].value;
			var xml=createAjaxObj();
			xml.open("post","./register_verify.php",false);
			var data="reg_no="+encodeURIComponent(reg_no)+"&user1="+encodeURIComponent(user1)+"&user2="+encodeURIComponent(user2)+"&email="+encodeURIComponent(email)+"&name="+encodeURIComponent(name)+"&year="+encodeURIComponent(year)+"&section="+encodeURIComponent(section)+"&number="+encodeURIComponent(number)+"&hometown="+encodeURIComponent(hometown)+"&register_submit=SUBMIT";
			xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xml.send(data);
			document.getElementById('fill_error').innerHTML=xml.responseText;
			if (xml.responseText=="")
			{
				document.getElementById('fill_error').innerHTML="executed";
				xml.open("post","./accpt_img.php",true);
				xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xml.send(data);
				xml.onreadystatechange=function()
				{
					if(xml.readyState==4 && xml.status==200)
					{document.getElementById('register_form_holder').innerHTML=xml.responseText;}
				}
			}
			return false;
		}
}
function valid_email(val)
{
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(val);
}
function readURL(input)
{
	if (input.files && input.files[0])
	{
		var reader = new FileReader();
		reader.onload = function (e)
		{
			if(verifyImg(e.target.result)==true)
				{$('#dummy_img img').attr('src',e.target.result);}
			else
				{alert("File uploaded is not a valid image file");}
		}
		reader.readAsDataURL(input.files[0]);
	}
}
function verifyImg(to_be_chkd)
{
	ext= to_be_chkd.substr(5,((to_be_chkd.indexOf(";"))-5));
	byt=to_be_chkd.length/1.37;
	if((ext=="image/jpeg" || ext=="image/png" || ext=="image/gif") && byt<=270028 )
		{return true;}
	else
		{return false;}
}

function feedData()
{
	var reg_no=document.forms['hidden_form'].elements['reg_no'].value;
	var user1=document.forms['hidden_form'].elements['user1'].value;
	var user2=document.forms['hidden_form'].elements['user2'].value;
	var email=document.forms['hidden_form'].elements['email'].value;
	var name=document.forms['hidden_form'].elements['name'].value;
	var year=document.forms['hidden_form'].elements['year'].value;
	var section=document.forms['hidden_form'].elements['section'].value;
	var number=document.forms['hidden_form'].elements['number'].value;
	var hometown=document.forms['hidden_form'].elements['hometown'].value;
	var img =document.getElementById('dummy_img').getElementsByTagName("img")[0].src;

	var data="reg_no="+encodeURIComponent(reg_no)+"&user1="+encodeURIComponent(user1)+"&user2="+encodeURIComponent(user2)+"&email="+encodeURIComponent(email)+"&name="+encodeURIComponent(name)+"&year="+encodeURIComponent(year)+"&section="+encodeURIComponent(section)+"&number="+encodeURIComponent(number)+"&hometown="+encodeURIComponent(hometown)+"&dp="+encodeURIComponent(img);
	xml=createAjaxObj();
	xml.open("post","./register_feed.php",true);
	xml.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xml.send(data);
	xml.onreadystatechange=function()
	{
		if(xml.readyState==4 && xml.status==200)
		{document.getElementById('register_form_holder').innerHTML=xml.responseText;}
	}
	return false;
}

/* alternate function to verify the uploaded img file by the user in which error was detected by the browser */

// function verifyImg()
// {
// 	$.ajaxFileUpload(
// 	{

// 		url:'verify_img.php',
// 		secureuri:false,
// 		fileElementId:'dp_upload_input',
// 		dataType: 'json',
// 		success: function ()
// 		{
// 			alert("file sent");
// 		},
// 		error: function()
// 		{
// 			alert("file error");
// 		}

// 	});
// 	return false;
// }
