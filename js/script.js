function crearmapa(id,lat,long){
var mapOptions = {
    zoom: 12,
    center: new google.maps.LatLng(lat, long),
    mapTypeId: google.maps.MapTypeId.ROADMAP 
  };

  var map = new google.maps.Map(document.getElementById(id),
      mapOptions);


    // Construct the circle for each value in citymap. We scale population by 20.
    var populationOptions = {
      strokeColor: '#13BBE8',
      strokeOpacity: 0.8,
      strokeWeight: 2,
     fillColor: '#13BBE8',
     fillOpacity: 0.35,
      map: map,
      center: map.center,
      radius: 10000 / 10
    };
    cityCircle = new google.maps.Circle(populationOptions);



}

$(document).ready(function(){

$( "#mortgage_calc_form" ).submit(function( event ) {
  calculate_mortgage();
  event.preventDefault();
});


$("#contact-form").bootstrapValidator();


  var frm = $('#formpro');
    frm.submit(function () {

  var msgerror='';
  if(frm.find('#nombre').val()=="")
  {
    msgerror = '* Nombre\n';
  
  }
  if(frm.find('#telefono').val()=="")
  {
    msgerror += '* Telefono\n';
  
  }
  if(validarEmail(frm.find('#email').val())==false)
  {
    msgerror += '* Email incorrecto\n';
  
  }
  if(frm.find('#comentario').val()=="")
  {
    msgerror += '* Observaciones\n';
  
  }
  if (msgerror!='')
  {
  
    alert('Los siguientes campos son obligatorios:\n\n'+msgerror);
    return false;
    
  }else{
  
  
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {

                  alert('Gracias, correo enviado correctamente.');
					frm.trigger("reset");
            }
        });

        return false;
    }
});
  
});

function validarEmail(valor) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
		return (true)
	 } else {
		return (false);
	}
}
			 
function validarEntero(param){
	
	var valor = parseInt(param);
	
	if(isNaN(valor)){
		return false;
		
	}else{
	
		return true;
		
	}
}


function validar(){
	var msgerror='';
	
	// nombre	
	if (document.formulario.nombre.value=='Introduce tu Nombre..' || document.formulario.nombre.value=='Enter your Name..' ) 
		msgerror = '* Nombre\n';
	// telefono		
	if(document.formulario.telefono.value=='Introduce tu Teléfono..' || document.formulario.telefono.value=='Enter your Phone..' )
		msgerror += '* Telefono\n';
		
	// email	
	if (validarEmail(document.formulario.email.value)==false)
		msgerror += '* Email incorrecto\n';

	// comentario
	if (document.formulario.comentario.value=='Tu Comentario..' || document.formulario.comentario.value=='Enter your Comment..') 
		msgerror += '* Comentario\n';
		
	
	
	
	
	if (msgerror==''){
		document.formulario.email.focus();
	}
	if (msgerror!=''){
	
		alert('Los siguientes campos son obligatorios:\n\n'+msgerror);
		return false;
		
		}
	else{
	

		document.formulario.submit();
		return true;

	}
}
function validarquiero(){
	var msgerror='';
	
	// nombre	
	if (document.formquiero.nombre.value=='') 
		msgerror = '* Nombre\n';
	// telefono		
	if(document.formquiero.telefono.value=='')
		msgerror += '* Telefono\n';
		
	// email	
	if (validarEmail(document.formquiero.email.value)==false)
		msgerror += '* Email incorrecto\n';

	// comentario
	if (document.formquiero.comentario.value=='') 
		msgerror += '* Comentario\n';
		
	
	
	
	
	if (msgerror==''){
		document.formquiero.email.focus();
	}
	if (msgerror!=''){
	
		alert('Los siguientes campos son obligatorios:\n\n'+msgerror);
		return false;
		
		}
	else{
	

		document.formquiero.submit();
		return true;

	}
}
$(document).ready(function(){

	$( "#mortgage_calc_form" ).submit(function( event ) {
	  event.preventDefault();
	})
});
function calculate_loan_amount() {
	var form = document.mortgage_calc_form;
	
	form.loan.value = (form.total_property_value.value - form.deposit.value); 
}


function calculate_mortgage() {
	var form = document.mortgage_calc_form;
	
	// do field validation
	if (form.loan.value == ""){
		alert( "Importe del prestamo obligatorio." ); 
		 return false;
	} else if (form.duration.value == ""){
		alert( "Duracion obligatoria." );  
		return false;
	} else if (form.interest_rate.value == ""){
		alert( "Tipo de interes obligatorio." ); 
		return false;
	} else {
		var loan = form.loan.value;
		loan = loan.replace(",",""); // Remove commas
		
		//Round instead of replace decimal
		//loan = loan.replace(".","");    // Remove preiods
        loan = Math.round(loan);

		form.loan.value = loan; // refresh loan amount in form without commas or periods
		
		if (form.duration_units.value == 1) { // Duration in years
			var duration = (form.duration.value*12); // in months
		}
		else { // Duration in months
			var duration = form.duration.value; // in months
		}
		
		var interest_rate = form.interest_rate.value.replace(",","."); // Replace comma with period
		form.interest_rate.value = interest_rate; // refresh duration in form without commas
		interest_rate = (interest_rate/12); // monthly
		
		var quote = (loan * interest_rate) / ( 100 * ( 1 - Math.pow ( ( 1 + (interest_rate/100) ), -duration ) ) );
		
		if (quote.toFixed) { //if browser supports toFixed() method
			quote = quote.toFixed(2);
		}
		
		form.quote.value = quote; // monthly
		
		// Calculate total to be repaid
		var total = (quote * duration);
		form.total.value = total; // total
	}
}


var mortgage_calc_popUpWin=0;
function mortgage_calc_popUpWindow(URLStr, left, top, width, height) {
  if(mortgage_calc_popUpWin) {
    if(!mortgage_calc_popUpWin.closed) mortgage_calc_popUpWin.close();
  }
  mortgage_calc_popUpWin = open(URLStr, 'mortgage_calc_popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}