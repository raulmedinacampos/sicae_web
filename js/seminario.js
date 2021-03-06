function Init() {
	$(".datepicker").datepicker();
	
	$('[data-toggle="tooltip"]').tooltip();
}

function SaveData() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formSeminario").valid() ) {
			$.post(
				'/seminario/guardar', 
				$("#formSeminario").serialize(), 
				function(data) {
					$("#idSolicitud").val(data);
					
					$.post(
						'/seminario/montos', 
						$("#formSeminario").serialize(), 
						function(data) {}
					);
				}
			);
			
			$("#modalAviso .modal-title").html('Información actualizada');
			$("#modalAviso .modal-body").html('<div class="alert alert-success">La información ha sido actualizada</div>');
			$("#modalAviso").modal('show');
		} else {
			var ctrlError = $("div.tab-content").find(".has-error").first();
			var tab = ctrlError.parents(".tab-pane");
			var tabID = tab.attr("id");
			
			$("#modalAviso .modal-title").html('Error');
			$("#modalAviso .modal-body").html('<div class="alert alert-danger">Verifica cada una de las pestañas, aún hay campos pendientes de llenar.</div>');
			$("#modalAviso").modal('show');
			
			$('#modalAviso').on('hidden.bs.modal', function(e) {
				$('[href="#'+tabID+'"]').tab('show');
				
				$('html, body').animate({
			        scrollTop: ctrlError.offset().top - 150
			    }, 500);
			});
		}
	});
}

function Validate() {
	$.validator.addMethod("moneda", function(value, element) {
	    return this.optional(element) || /^\d{0,8}(\.\d{0,2})?$/i.test(value);
	}, "Ingresa una cantidad válida");
	
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formSeminario").validate({
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
			tipoEvento: {
				required: true
			},
			evento: {
				required: true
			},
			sede: {
				required: true
			},
			institucion: {
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
			},
			moneda: {
				required: true
			},
			apoyo: {
				required: true
			},
			institucionAp: {
				required: "#rdbApS:checked"
			},
			montoAp: {
				required: "#rdbApS:checked",
				moneda: true
			},
			monedaAp: {
				required: "#rdbApS:checked"
			}
		},
		messages: {
			
		}
	});
}

$gmx(document).ready(function() {
	Init();
	SaveData();
	Validate();
});