function Init() {
	$(".datepicker").datepicker();
	
	$('[data-toggle="tooltip"]').tooltip();
}

function SaveData() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formGrado").valid() ) {
			$.post(
				'/obtencion-de-grado/guardar', 
				$("#formGrado").serialize(), 
				function(data) {
					$("#idSolicitud").val(data);
					
					$.post(
						'/obtencion-de-grado/montos', 
						$("#formEstancia").serialize(), 
						function(data) {}
					);
				}
			);
			
			$("#modalAviso .modal-title").html('Información actualizada');
			$("#modalAviso .modal-body").html('<div class="alert alert-success">La información ha sido actualizada</div>');
			$("#modalAviso").modal('show');
		} else {
			$("#modalAviso .modal-title").html('Error');
			$("#modalAviso .modal-body").html('<div class="alert alert-danger">Verifica cada una de las pestañas, aún hay campos pendientes de llenar.</div>');
			$("#modalAviso").modal('show');
		}
	});
}

function Validate() {
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formGrado").validate({
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
			universidad: {
				required: true
			},
			grado: {
				required: true
			},
			sede: {
				required: true
			},
			fechaExamen: {
				required: true
			},
			fechaInicio: {
				required: true
			},
			fechaFin: {
				required: true
			},
			itinerario: {
				required: true
			}
		},
		messages: {
			
		}
	});
}

$gmx(document).ready(function() {
	Init();
	Validate();
});