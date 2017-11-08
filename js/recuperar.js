function Init() {
	$("#curp").displayAsUppercase();
}

function SendMail() {
	$("#btnEnviar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formRecuperar").valid() ) {
			$.post(
				'', 
				$("#formRecuperar").serialize(), 
				function(data){
					if ( data == "1" ) {
						$("#modalAviso .modal-title").html('Contraseña recuperada');
						$("#modalAviso .modal-body").html('<div class="alert alert-success">Se ha enviado un correo electrónico con tus datos de acceso.<br />En caso de no verlo te pedimos revisar la carpeta de correo no deseado.</div>');
						$("#modalAviso").modal('show');
					} else {
						$("#modalAviso .modal-title").html('Error');
						$("#modalAviso .modal-body").html('<div class="alert alert-danger">Este CURP no está registrado. Por favor, comunícate al área correspondiente.</div>');
						$("#modalAviso").modal('show');
					}
				}
			);
		}
	});
}

function Validate() {
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formRecuperar").validate({
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
			curp: {
				required: true,
				minlength: 18
			}
		},
		messages: {
			curp: {
				minlength: "El CURP es incorrecto"
			}
		}
	});
}

$(function() {
	Init();
	SendMail();
	Validate();
});