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
				minlength: 13
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
			lada: {
				required: true,
				digits: true,
				minlength: 2
			},
			telefono: {
				required: true,
				digits: true,
				minlength: 7
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
			lada: {
				minlength: "La lada debe tener 2 o 3 dígitos",
			},
			telefono: {
				minlength: "El número telefónico debe ser de 7 dígitos"
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
	Validate();
});