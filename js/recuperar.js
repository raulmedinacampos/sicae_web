function Init() {
	$("#curp").displayAsUppercase();
}

function Validate() {
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formRecuperar").validate({
		ignore: [],
		errorElement: "span",
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
	Validate();
});