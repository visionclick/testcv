
head.ready(function(){
	//$(".colorbox").colorbox();
var errors;
	$( "#datepicker,#datepicker1" ).datepicker({ 
	closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1
	});

	$(".gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true,deeplinking:false});

	$(window).load(function(){
    	$('#slider').nivoSlider({
        effect:"random", slices:15, boxCols:8, boxRows:4, animSpeed:500, pauseTime:5000, startSlide:0, directionNav:true, directionNavHide:true, controlNav:true, controlNavThumbs:false, controlNavThumbsFromRel:true, keyboardNav:true, pauseOnHover:true, manualAdvance:false,borderRadius:20 });
    });

	$(".contactform_es").validate({
		rules: {
			nombre: "required",
			email: {
				required: true,
				email: true
			}			
		},
		messages: {
			nombre: "Por favor introduzca su nombre.",
			email: "Por favor introduzca un Email válido."
		}
	});

	$.validator.setDefaults({
		submitHandler: function() { $(this).send(); }
	});

	$(".contactform_es").validate({
		rules: {
			nombre: "required",
			email: {
				required: true,
				email: true
			}			
		},
		messages: {
			nombre: "Por favor introduzca su nombre.",
			email: "Por favor introduzca un Email válido."
		}
	});

	$(".contactform_en").validate({
		rules: {
			nombre: "required",
			email: {
				required: true,
				email: true
			}			
		},
		messages: {
			nombre: "Please enter your firstname",
			email: "Please enter a valid email address"
		}
	});

	$("#formpresupuesto_es").validate({
		onfocusout: false,
        onkeyup: false,
        onclick: false,
        onsubmit:true,
		
		rules: {
			tiposervicio: "required",
			lugarsalida: "required",
			destino: "required",
			fechasalida: "required",
			horasalida: "required",
			fecharegreso: "required",
			horaregreso: "required",
			nplazas: "required",
			nombre: "required",
			apellidos: "required",
			telefono: {
				required: true,
				minlength: 9
			},
			aceptarcondiciones: "required"
		},
		messages: {
			tiposervicio: "tipo de servicio ",
			lugarsalida: "lugar de salida",
			destino: "destino",
			fechasalida: "fecha de salida",
			horasalida: "hora de salida",
			fecharegreso: "fecha de regreso",
			horaregreso: "hora de regreso",
			nplazas: "nº de plazas",
			nombre: "nombre",
			apellidos: "apellidos",
			telefono: {
				required: "su telefono",
				minlength: "Su telefono debe tener al menos 9 dígitos"
			},
			aceptarcondiciones: "Por favor, acepte las condiciones"
			},
			errorPlacement: function(errors, element) {
			errors +=  errors.toString()+"\n";

			},
			showErrors: function(errorMap, errorList){
			var summary = "Por favor, introduzca: \n";
	        $.each(errorList, function() {
	            summary += " * " + this.message + "\n";
	        });
	        alert(summary);
	        this.defaultShowErrors();
			}





	});

	$("#formpresupuesto_en").validate({
		rules: {
			tiposervicio: "required",
			lugarsalida: "required",
			destino: "required",
			fechasalida: "required",
			horasalida: "required",
			fecharegreso: "required",
			horaregreso: "required",
			nplazas: "required",
			nombre: "required",
			apellidos: "required",
			telefono: {
				required: true,
				minlength: 9
			},
			aceptarcondiciones: "required"
		},
		messages: {
			tiposervicio: "Please enter, type of service",
			lugarsalida: "Please enter, teeing",
			destino: "Please enter, destination",
			fechasalida: "Please enter, departure date",
			horasalida: "Please enter, departure dime",
			fecharegreso: "Please enter, return date",
			horaregreso: "Please enter, return time",
			nplazas: "Please enter, nº of places",
			nombre: "Please enter, name",
			apellidos: "Please enter, surname",
			telefono: {
				required: "Please enter, telephone.",
				minlength: "Your phone must be at least 9 digits"
			},
			aceptarcondiciones: "Please, accept our conditions"
		}
	});

	$("#empleo_es").validate({
		rules: {
			nombre: "required",
			apellidos: "required",
			fechanacimiento: "required",
			lugarnacimiento: "required",
			horasalida: "required",
			edad: "required",
			nacionalidad: "required",
			estadocivil: "required",
			domicilioactual: "required",
			telefono: {
				required: true,
				minlength: 9
			},
			email: {
				required: true,
				email: true
			},
			formacionacademica: "required",
			idiomas: "required",
			experiencialaboral: "required",
			aceptarcondiciones: "required"
		},
		messages: {
			nombre: "Por favor, introduzca nombre",
			apellidos: "Por favor, introduzca apellidos",
			fechanacimiento: "Por favor, fecha de nacimiento",
			lugarnacimiento: "Por favor, lugar de nacimiento",
			edad: "Por favor, introduzca edad",
			nacionalidad: "Por favor, introduzca nacionalidad",
			estadocivil: "Por favor, introduzca estado civil",
			domicilioactual: "Por favor, domicilio actual",
			telefono: {
				required: 'Por favor, introduzca telefono',
				minlength: 'Su telefono debe tener al menos 9 dígitos'
			},
			email: {
				required: "Por favor, introduzca email.",
				email: "Por favor, introzca un email válido"
			},
			formacionacademica: "Por favor, introduzca formación académica",
			idiomas: "Por favor, introduzca idiomas",
			experiencialaboral: "Por favor, introduzca experiencia laboral",
			aceptarcondiciones: "Por favor, acepte las condiciones"
		}
	});

	$("#empleo_en").validate({
		rules: {
			nombre: "required",
			apellidos: "required",
			fechanacimiento: "required",
			lugarnacimiento: "required",
			horasalida: "required",
			edad: "required",
			nacionalidad: "required",
			estadocivil: "required",
			domicilioactual: "required",
			telefono: {
				required: true,
				minlength: 9
			},
			email: {
				required: true,
				email: true
			},
			formacionacademica: "required",
			aceptarcondiciones: "required"
		},
		messages: {
			nombre: "Please, enter name",
			apellidos: "Please, enter surname",
			fechanacimiento: "Please, date of birth",
			lugarnacimiento: "Please, birthplace",
			edad: "Please, enter age",
			nacionalidad: "Please, enter nationality",
			estadocivil: "Please, enter marital status",
			domicilioactual: "Please, current address",
			telefono: {
				required: 'Please, enter telephone',
				minlength: 'Your phone must be at least 9 digits'
			},
			email: {
				required: "Please, enter email.",
				email: "Please, enter a valid email address"
			},
			formacionacademica: "Please, enter academic",
			aceptarcondiciones: "Please, acepte the conditions"
		}
	});

	$("#formsugerencias_es").validate({
		rules: {
			nombre: "required",
			aceptarcondiciones: "required"
		},
		messages: {
			nombre: "Por favor, introduzca su nombre.",
			aceptarcondiciones: "Please, acepte the conditions"
		}
	});

	$("#formsugerencias_en").validate({
		rules: {
			nombre: "required",
			aceptarcondiciones: "required"
		},
		messages: {
			nombre: "Please, enter your name",
			aceptarcondiciones: "Please, acepte the conditions"
		}
	});

	$("#formencuesta_es").validate({
		rules: {
			nombre: "required"
		},
		messages: {
			nombre: "Por favor, introduzca su nombre."
		}
	});

	$("#formencuesta_en").validate({
		rules: {
			nombre: "required"
		},
		messages: {
			nombre: "Please, enter your name."
		}
	});

});

