var enviar ='no';
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}
function ltrim(stringToTrim) {
	return stringToTrim.replace(/^\s+/,"");
}
function rtrim(stringToTrim) {
	return stringToTrim.replace(/\s+$/,"");
}
function IsNumeric(valor) 
		{ 
			var log=valor.length; var sw="S"; 
			for (x=0; x<log; x++) 
				{ v1=valor.substr(x,1); 
				v2 = parseInt(v1); 
				//Compruebo si es un valor numérico 
				if (isNaN(v2)) { sw= "N";} 
				} 
				if (sw=="S") {return true;} else {return false; } 
		} 
function validarEmail(valor) {
			  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
			   return (true)
			  } else {
			      return (false);
			  }
			 }

function validarContacto()
{
	var msgerror='';
	
	if (document.contactform.nombre.value=='') 
		msgerror = '* Nombre\n';

	if (document.contactform.email.value=='') 
		msgerror += '* Email\n';
	else
	{
		if (validarEmail(document.contactform.email.value)==false)
		msgerror = msgerror +'* El Email parece incorrecto\n';
	}

	if (document.contactform.message.value=='') 
		msgerror += '* Mensaje\n';
	
	
	
	if (msgerror==''){
		document.contactform.email.focus();
	}
	if (msgerror!=''){
		alert('Los siguientes campos son obligatorios:\n\n'+msgerror);
		return false;
		}
	else{
		document.contactform.action="contact.php";
		document.contactform.submit();
		return true;

	}
}

