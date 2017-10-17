function Init() {
	$(".datepicker").datepicker();
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

$(function() {
	Init();
	Validate();
});