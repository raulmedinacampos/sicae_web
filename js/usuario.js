function Init() {
	$(".datepicker").datetimepicker({
		format: "DD/MM/YYYY"
	});
	
	$("#emailConf, #passwordConf").on("cut copy paste", function(e) {
		e.preventDefault();
	});
	
	$("#curp, #rfc").displayAsUppercase();
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
		errorElement: "span",
		errorClass: "help-block",
		errorPlacement: function(error, element) {
			if ( element.attr("name") == "rPerfil" ) {
		        error.insertAfter(".tipo-perfil");
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
			telefono: {
				required: true,
				digits: true,
				minlength: 10
			},
			extension: {
				required: true,
				digits: true,
				minlength: 3,
				maxlength: 6
			},
			escuela: {
				required: true
			},
			password: {
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
				minlength: "El número telefónico debe ser de por lo menos 10 dígitos"
			},
			extension: {
				minlength: "La extensión debe ser de 3 a 6 dígitos"
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