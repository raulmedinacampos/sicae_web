function Init() {
	$(".datepicker").datepicker();
	
	$('[data-toggle="tooltip"]').tooltip();
}

function ToogleInsurance() {
	$('input[name="lugar"]').click(function() {
		var elem = $(this);
		
		if ( elem.is(":checked") && elem.val() == "I" ) {
			$(".oculto").css("display", "block");
		} else {
			$(".oculto").css("display", "none");
		}
	});
}

function SaveData() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formEstancia").valid() ) {
			$.post(
				'/estancia-de-investigacion/guardar', 
				$("#formEstancia").serialize(), 
				function(data) {
					$("#idSolicitud").val(data);
					
					$.post(
						'/estancia-de-investigacion/montos', 
						$("#formEstancia").serialize(), 
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
	
	$("#formEstancia").validate({
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
			sede: {
				required: true
			},
			objetivo: {
				required: true
			},
			beneficio: {
				required: true
			},
			programa: {
				required: true
			},
			lugar: {
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
			aereo: {
				moneda: true
			},
			terrestre: {
				moneda: true
			},
			seguroViaje: {
				required: function(element) {
					return $('input[name="lugar"]:checked').val() == "I";
				},
				moneda: true
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
	ToogleInsurance();
	SaveData();
	Validate();
	
	if ( $("#rdbLI").is(":checked") ) {
		$(".oculto").css("display", "block");
	}
});