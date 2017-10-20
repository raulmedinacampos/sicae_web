function Init() {
	$("#fechaNac, #fechaNacC").datepicker();
	
	$(window).load(function() {
        $('#slider').nivoSlider({
        	effect: 'boxRainGrowReverse',
        	directionNav: false,
        	controlNav: false
        });
    });
	
	$("#emailConf, #passwordConf").on("cut copy paste", function(e) {
		e.preventDefault();
	});
	
	$("#curp, #rfc, #curpA, #curpC").displayAsUppercase();
	
	$("#password, #passwordConf, #passA").password({
		message: "Haga click aquí para ver u ocultar la contraseña"
	});
}

function OpenNewUserModal() {
	$("#btnNuevoUsuario").click(function(e) {
		e.preventDefault();
		
		$('#formNuevo input[type="text"]').each(function() {
			$(this).val("");
		});
		
		$('#formNuevo input[type="password"]').each(function() {
			$(this).val("");
		});
		
		$("#formNuevo select").each(function() {
			$(this).val("");
		});
		
		$(".radio-perfil input").each(function() {
			$(this).prop("checked", false);
			$(this).parent().children("div").removeClass("active");
		});
		
		$("#perfil").addClass("active");
		$("#registro").removeClass("active");
		
		$("#btnAnterior").css("display", "none");
		$("#btnSiguiente").css("display", "inline");
		$("#btnGuardar").css("display", "none");
		
		jQuery("#modalNuevo").modal("show");
	});
}

function OpenNewOrganizerModal() {
	$("#btnNuevoCoordinador").click(function(e) {
		e.preventDefault();
		
		$('#formNuevo input[type="text"]').each(function() {
			$(this).val("");
		});
		
		$('#formNuevo input[type="password"]').each(function() {
			$(this).val("");
		});
		
		$("#formNuevo select").each(function() {
			$(this).val("");
		});
		
		$(".radio-perfil input").each(function() {
			$(this).prop("checked", false);
			$(this).parent().children("div").removeClass("active");
		});
		
		$("#perfil").addClass("active");
		$("#registro").removeClass("active");
		
		$("#btnAnterior").css("display", "none");
		$("#btnSiguiente").css("display", "inline");
		$("#btnGuardar").css("display", "none");
		
		jQuery("#modalCoordinador").modal("show");
	});
}

function ChooseProfile() {
	$(".radio-perfil input").click(function() {
		var elem = $(this);
		
		if ( elem.parent().children("div").hasClass("active") ) {
			elem.parent().children("div").removeClass("active");
			elem.prop("checked", false);
		} else {
			$(".radio-perfil input").each(function() {
				if ( elem != $(this) ) {
					$(this).parent().children("div").removeClass("active");
				}
			});
			
			elem.parent().children("div").addClass("active");
		}
	});
}

function Navigate() {
	$("#btnSiguiente").click(function(e) {
		e.preventDefault();
		
		if ( $('input[name="rPerfil"]').valid() ) {
			$("#perfil").removeClass("active");
			$("#registro").addClass("active");
			
			$("#btnAnterior").css("display", "inline");
			$("#btnSiguiente").css("display", "none");
			$("#btnGuardar").css("display", "inline");
		}
	});
	
	$("#btnAnterior").click(function(e) {
		e.preventDefault();
		
		$("#perfil").addClass("active");
		$("#registro").removeClass("active");
		
		$("#btnAnterior").css("display", "none");
		$("#btnSiguiente").css("display", "inline");
		$("#btnGuardar").css("display", "none");
	});
}

function Validate() {
	$.validator.methods.email = function( value, element ) {
		return this.optional( element ) || /[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+/.test( value );
	}
	
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formLoginA").validate({
		ignore: [],
		errorElement: "small",
		errorClass: "help-block",
		errorPlacement: function(error, element) {
			if ( element.parent(".input-group").length ) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		highlight: function(element) {
			$(element).closest(".form-group").addClass("has-error");
		},
		unhighlight: function(element) {
			$(element).closest(".form-group").removeClass("has-error");
		},
		rules: {
			curpA: {
				required: true,
				minlength: 18
			},
			passA: {
				required: true
			}
		},
		messages: {
			curpA: {
				minlength: "El CURP es incorrecto"
			}
		}
	});
	
	$("#formLoginC").validate({
		ignore: [],
		errorElement: "small",
		errorClass: "help-block",
		errorPlacement: function(error, element) {
			if ( element.parent(".input-group").length ) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		highlight: function(element) {
			$(element).closest(".form-group").addClass("has-error");
		},
		unhighlight: function(element) {
			$(element).closest(".form-group").removeClass("has-error");
		},
		rules: {
			curpC: {
				required: true,
				minlength: 18
			},
			escuelaC: {
				required: true
			}
		},
		messages: {
			curpC: {
				minlength: "El CURP es incorrecto"
			}
		}
	});
	
	$("#formNuevo").validate({
		ignore: [],
		errorElement: "small",
		errorClass: "help-block",
		errorPlacement: function(error, element) {
			if ( element.attr("name") == "rPerfil" ) {
		        error.insertAfter(".tipo-perfil");
			} else if ( element.attr("type") == "radio" ) {
				error.insertAfter(element.parent().parent());
			} else if ( element.parent(".input-group").length ) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		highlight: function(element) {
			$(element).closest(".form-group").addClass("has-error");
		},
		unhighlight: function(element) {
			$(element).closest(".form-group").removeClass("has-error");
		},
		rules: {
			rPerfil: {
				required: true
			},
			nombre: {
				required: true
			},
			apPaterno: {
				required: true
			},
			apMaterno: {
				required: true
			},
			fechaNac: {
				required: true
			},
			curp: {
				required: true,
				minlength: 18
			},
			rfc: {
				required: true,
				minlength: 10
			},
			sexo: {
				required: true
			},
			nacionalidad: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			emailConf: {
				equalTo: "#email"
			},
			telefono: {
				required: true,
				digits: true,
				minlength: 10
			},
			extension: {
				required: true,
				digits: true,
				minlength: 5
			},
			escuela: {
				required: true
			},
			password: {
				required: true
			},
			passwordConf: {
				equalTo: "#password"
			}
		},
		messages: {
			rPerfil: "Seleccione un tipo de usuario",
			curp: {
				minlength: "El CURP es incorrecto"
			},
			rfc: {
				minlength: "El RFC es incorrecto"
			},
			email: {
				email: "El correo es incorrecto"
			},
			emailConf: "El correo no coincide",
			telefono: {
				minlength: "El número telefónico debe ser de 10 dígitos"
			},
			extension: {
				minlength: "La extensión debe ser de 5 dígitos"
			},
			passwordConf: "La contraseña no coincide"
		}
	});
	
	$("#formNuevoCoordinador").validate({
		ignore: [],
		errorElement: "small",
		errorClass: "help-block",
		errorPlacement: function(error, element) {
			if ( element.attr("type") == "radio" ) {
				error.insertAfter(element.parent().parent());
			} else if ( element.parent(".input-group").length ) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		highlight: function(element) {
			$(element).closest(".form-group").addClass("has-error");
		},
		unhighlight: function(element) {
			$(element).closest(".form-group").removeClass("has-error");
		},
		rules: {
			nombreC: {
				required: true
			},
			apPaternoC: {
				required: true
			},
			apMaternoC: {
				required: true
			},
			fechaNacC: {
				required: true
			},
			curpC: {
				required: true,
				minlength: 18
			},
			sexoC: {
				required: true
			},
			emailC: {
				required: true,
				email: true
			},
			emailConfC: {
				equalTo: "#emailC"
			},
			telefonoC: {
				required: true,
				digits: true,
				minlength: 10
			},
			extensionC: {
				required: true,
				digits: true,
				minlength: 5
			},
			escuelaC: {
				required: true
			}
		},
		messages: {
			curpC: {
				minlength: "El CURP es incorrecto"
			},
			emailC: {
				email: "El correo es incorrecto"
			},
			emailConfC: "El correo no coincide",
			telefonoC: {
				minlength: "El número telefónico debe ser de 10 dígitos"
			},
			extensionC: {
				minlength: "La extensión debe ser de 5 dígitos"
			}
		}
	});
}

$gmx(document).ready(function() {
	/*$.noConflict();*/
	Init();
	OpenNewUserModal();
	OpenNewOrganizerModal();
	ChooseProfile();
	Navigate();
	Validate();
});