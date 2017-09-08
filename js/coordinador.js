function Init() {
	$(".datepicker").datetimepicker({
		format: "DD/MM/YYYY"
	});
	
	$("#emailConf").on("cut copy paste", function(e) {
		e.preventDefault();
	});
	
	$("#curp").displayAsUppercase();
}

function Validate() {
	$.validator.methods.email = function( value, element ) {
		return this.optional( element ) || /[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+/.test( value );
	}
	
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formCoordinador").validate({
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
			sexo: {
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
			}
		},
		messages: {
			curp: {
				minlength: "El CURP es incorrecto"
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
			}
		}
	});
}

$(function() {
	Init();
	Validate();
});