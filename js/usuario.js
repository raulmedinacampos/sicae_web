function Init() {
	$(".datepicker").datepicker();
	
	$("#emailConf, #passwordConf").on("cut copy paste", function(e) {
		e.preventDefault();
	});
	
	$("#curp, #rfc").displayAsUppercase();
	
	$("#password, #passwordConf").password({
		message: "Haga click aquí para ver u ocultar la contraseña"
	});
	
	$("#panel-base, #panel-interinato, #panel-sabatico, #panel-sueldo").css("display", "none");
	
	$('textarea[placeholder]').placeholder();
}

function ToggleProfData() {
	$("#tipoNombramiento").change(function() {
		var val = $(this).val();
		
		if ( val == 1 || val == 3 ) {
			$("#panel-base").css("display", "block");
			$("#panel-interinato").css("display", "none");
		}
		
		if ( val == 2 ) {
			$("#panel-base").css("display", "none");
			$("#panel-interinato").css("display", "block");
		}
	});
	
	$('input[name="sabatico"]').change(function() {
		var val = $(this).val();
		
		if ( val == 1 ) {
			$("#panel-sabatico").css("display", "block");
		} else {
			$("#panel-sabatico").css("display", "none");
		}
	});
	
	$('input[name="sueldo"]').change(function() {
		var val = $(this).val();
		
		if ( val == 1 ) {
			$("#panel-sueldo").css("display", "block");
		} else {
			$("#panel-sueldo").css("display", "none");
		}
	});
}

function EnableProjectDesc() {
	$(".tipoProy").change(function() {
		var p = $(this).parents(".panel-body");
		var input = p.find(".otro");
		
		if ( $(this).val() == "Otros" ) {
			input.prop("disabled", false);
		} else {
			input.prop("disabled", true);
		}
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
	
	$("#formUsuario").validate({
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
			passwordConf: {
				equalTo: "#password"
			},
			boleta: {
				required: true
			},
			semestre: {
				required: true,
				digits: true,
				maxlength: 2
			},
			promedio: {
				required: true,
				number: true
			},
			materiasCursa: {
				required: true
			},
			pifi: {
				required: true
			},
			conacyt: {
				required: true
			},
			numSIP: {
				required: true
			},
			nombreSIP: {
				required: true
			},
			escuelaSIP: {
				required: true
			},
			directorSIP: {
				required: true
			},
			banco: {
				required: true
			},
			sucursal: {
				required: true,
				digits: true
			},
			cuentaBanco: {
				required: true,
				digits: true
			},
			clabe: {
				required: true,
				digits: true
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
			passwordConf: "La contraseña no coincide",
			semestre: {
				maxlength: "El semestre no puede ser de más de dos dígitos"
			},
			promedio: {
				number: "El promedio debe ser entero o con dos decimales"
			},
			clabe: {
				maxlength: "La clave interbancaria debe ser de 18 dígitos"
			}
		}
	});
}

$(function() {
	Init();
	ToggleProfData();
	EnableProjectDesc();
	Validate();
});