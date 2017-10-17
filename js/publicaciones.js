function AddCoauthor() {
	var i = 2;
	$("#btnAgregarCoautor").click(function(e) {
		e.preventDefault();
		
		var panel = "";
		var elem = $(this).parents(".tab-pane").children(".ficha-collapse").last();
		var aria = "true";
		var collapse = "in";
		var collapsed = "";
		
		if ( i < 6 ) {
			aria = "false";
			collapse = "";
			collapsed = "collapsed";
			
			panel = '<div class="panel-group ficha-collapse" id="accordion'+i+'">';
			panel += '<div class="panel panel-default">';
			panel += '<div class="panel-heading">';
			panel += '<h4 class="panel-title">';
			panel += '<a data-parent="#accordion'+i+'" data-toggle="collapse" href="#panel-'+i+'" aria-expanded="true" aria-controls="panel-'+i+'">';
			panel += 'Coautor '+i;
			panel += '</a>';
			panel += '</h4>';
			panel += '<button type="button" class="collpase-button collapsed" data-parent="#accordion'+i+'" data-toggle="collapse" href="#panel-'+i+'"></button>';
			panel += '</div>';
			panel += '<div class="panel-collapse collapse in" id="panel-'+i+'">';
			panel += '<div class="panel-body">';
			panel += '<div class="row">';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Nombre(s):</label>';
			panel += '<input type="text" id="coNombre'+i+'" name="coNombre[]" class="form-control" placeholder="Nombre del autor" />';
			panel += '</div>';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Primer apellido:</label>';
			panel += '<input type="text" id="coApP'+i+'" name="coApP[]" class="form-control" placeholder="Primer apellido del autor" />';
			panel += '</div>';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Segundo apellido:</label>';
			panel += '<input type="text" id="coApM'+i+'" name="coApM[]" class="form-control" placeholder="Segundo apellido del autor" />';
			panel += '</div></div>';  //.row
			panel += '</div></div>';  // .panel-body y .collapse
			panel += '</div>';  // .panel
			panel += '</div>';  // .ficha-collapse
			elem.after(panel);
			
			$(".panel-collapse").each(function() {
				if ( "panel-"+i != $(this).attr("id") ) {
					$(this).collapse('hide');
				}
			});

			i++;
		}
	});
}

function Validate() {
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formPublicacion").validate({
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
			titulo: {
				required: true
			},
			revista: {
				required: true
			},
			issn: {
				required: true
			},
			sede: {
				required: true
			}
		},
		messages: {
			
		}
	});
}

$(function() {
	AddCoauthor();
	Validate();
})