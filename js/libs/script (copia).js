
head.ready(function(){

$('#slider').nivoSlider({
            effect:"slideInLeft",
			slices:15,
			boxCols:8,
			boxRows:4,
			animSpeed:500,
			pauseTime:2500,
			startSlide:0,
			directionNav:true,
			directionNavHide:false,
			controlNav:true,
			controlNavThumbs:false,
			controlNavThumbsFromRel:false,
			keyboardNav:true,
			pauseOnHover:true,
			manualAdvance:false
			});
		
		$( '#accordion, .accordion' ).accordion({
			autoHeight: false,
			collapsible: true,
			active: 20
		});

		$.validator.setDefaults({
		submitHandler: function() { $(this).send(); }
		});

	$("#formsemenes").validate({
		rules: {
			nombre: "required",
			apellidos: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			tfijo: {
				required: true,
				minlength: 9
			}
		},
		messages: {
			nombre: "Por favor Introduzca su nombre.",
			apellidos: {
				required: "Por favor Introduzca sus apellidos.",
				minlength: "Su apellido debe de tener más de dos caracteres."
			},
			email: "Por favor Introduzca un Email válido.",
			tfijo: {
				required: "Por favor Introduzca su telefono.",
				minlength: "Su telefono debe tener al menos 9 dígitos."
			}
		}
	});

	$("#formsemenen").validate({
		rules: {
			nombre: "required",
			apellidos: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			tfijo: {
				required: true,
				minlength: 9
			}
		},
		messages: {
			nombre: "Please enter your firstname",
			apellidos: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			email: "Please enter a valid email address",
			tfijo: {
				required: "Please enter a telehpone",
				minlength: "Your telephone must consist of at least 9 numbers"
			}
		}
	});

	$("#formovuloses").validate({
		rules: {
			nombre: "required",
			apellidos: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			tfijo: {
				required: true,
				minlength: 9
			}
		},
		messages: {
			nombre: "Por favor Introduzca su nombre.",
			apellidos: {
				required: "Por favor Introduzca sus apellidos.",
				minlength: "Sus apellidos deben de tener más de dos caracteres."
			},
			email: "Por favor Introduzca un Email válido.",
			tfijo: {
				required: "Por favor Introduzca su telefono.",
				minlength: "Su telefono debe tener al menos 9 dígitos."
			}
		}
	});
	$("#formovulosen").validate({
		rules: {
			nombre: "required",
			apellidos: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			tfijo: {
				required: true,
				minlength: 9
			}
		},
		messages: {
			nombre: "Please enter your firstname",
			apellidos: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			email: "Please enter a valid email address",
			tfijo: {
				required: "Please enter a telehpone",
				minlength: "Your telephone must consist of at least 9 numbers"
			}
		}
	});
	$("#contactar_en").validate({
		rules: {
			nombre: "required",
			apellidos: {
				required: true,
				minlength: 2
			},
			telefono: {
				required: true,
				minlength: 9
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			nombre: "Please enter your firstname",
			apellidos: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			telefono: {
				required: "Please enter a telehpone",
				minlength: "Your telephone must consist of at least 9 numbers"
			},
			email: "Please enter a valid email address"
			
		}
	});
	$("#contactar_es").validate({
		rules: {
			nombre: "required",
			apellidos: {
				required: true,
				minlength: 2
			},
			telefono: {
				required: true,
				minlength: 9
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			nombre: "Por favor, introduzca su nombre.",
			apellidos: {
				required: "Por favor, intreduzca sus apellidos.",
				minlength: "Sus apellidos deben de tener más de dos caracteres."
			},
			telefono: {
				required: "Por favor Introduzca su telefono.",
				minlength: "Su telefono debe tener al menos 9 dígitos."
			},
			email: "Por favor Introduzca un Email válido."
			
		}
	});
	$("#pedircita_en").validate({
		rules: {
			nombre: "required",
			apellidos: {
				required: true,
				minlength: 2
			},
			telefono: {
				required: true,
				minlength: 9
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			nombre: "Please enter your firstname",
			apellidos: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			telefono: {
				required: "Please enter a telehpone",
				minlength: "Your telephone must consist of at least 9 numbers"
			},
			email: "Please enter a valid email address"
		}
	});
	$("#pedircita_es").validate({
		rules: {
			nombre: "required",
			apellidos: {
				required: true,
				minlength: 2
			},
			telefono: {
				required: true,
				minlength: 9
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			nombre: "Por favor, introduzca su nombre.",
			apellidos: {
				required: "Por favor, intreduzca sus apellidos.",
				minlength: "Sus apellidos deben de tener más de dos caracteres."
			},
			telefono: {
				required: "Por favor Introduzca su telefono.",
				minlength: "Su telefono debe tener al menos 9 dígitos."
			},
			email: "Por favor Introduzca un Email válido."
		}
	});

});




