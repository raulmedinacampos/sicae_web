var i = 2;

	function Init() {
	$('[data-toggle="tooltip"]').tooltip();
}

function AddCoauthor() {
	var total = $("#hdnTotalCoautores").val();
	
	if ( total > 2 ) {
		i = total;
	}
	
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
			panel += '<a href="#"><span class="glyphicon glyphicon-trash"></span></a>';
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
			
			if ( elem.length > 0 ) {
				elem.after(panel);
			} else {
				$(".tab-pane > .row").after(panel);
			}
			
			$(".panel-collapse").each(function() {
				if ( "panel-"+i != $(this).attr("id") ) {
					$(this).collapse('hide');
				}
			});
			
			DeleteCoauthor();

			i++;
		}
	});
}

function DeleteCoauthor() {
	$("#coautores .panel-body a").click(function(e) {
		e.preventDefault();
		
		var panel = $(this).parents(".panel-group");
		panel.remove();
		
		i--;
	});
}

function SaveData() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formPublicacion").valid() ) {
			$.post(
				'/publicacion/guardar', 
				$("#formPublicacion").serialize(), 
				function(data) {
					$("#idSolicitud").val(data);
					
					$.post(
						'/publicacion/coautores', 
						$("#formPublicacion").serialize(), 
						function(data) {}
					);
					
					$.post(
						'/publicacion/montos', 
						$("#formPublicacion").serialize(), 
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

$gmx(document).ready(function() {
	Init();
	AddCoauthor();
	DeleteCoauthor();
	SaveData();
	Validate();
})