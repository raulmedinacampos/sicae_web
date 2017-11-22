var i = 2;
var j = 2;
var z = new Array();

function Init() {
	$(".datepicker").datepicker();
	
	$('[data-toggle="tooltip"]').tooltip();
	
	$('textarea[placeholder]').placeholder();
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

function AddSpeechTitle() {
	var total = $("#hdnTotalExp").val();
	
	if ( total > 2 ) {
		i = total;
	}
	
	$("#btnAgregarPonencia").click(function(e) {
		e.preventDefault();
		
		var input;
		var elem = $(this).parents(".tab-pane").children(".row").last();
		
		if ( i < 4 ) {
			input = '<div class="row">';
			input += '<div class="form-group col-sm-12">';
			input += '<label>Ponencia '+i+'. Título de la ponencia en inglés y español</label>';
			input += '<a href="#"><span class="glyphicon glyphicon-trash"></span></a>';
			input += '<textarea id="tituloPonencia'+i+'" name="tituloPonencia[]" rows="3" class="form-control" placeholder="Anota el nombre de tu ponencia en inglés y en español separados por un salto de línea."></textarea>';
			input += '</div></div>';
			
			if ( elem.length > 0 ) {
				elem.after(input);
			} else {
				$("#ponencias > .row").after(input);
			}
			
			i++;
			
			DeleteSpeechTitle();
		}
	});
}

function DeleteSpeechTitle() {
	$("#ponencias label + a").click(function(e) {
		e.preventDefault();
		
		if ( i > 2 ) {
			var panel = $(this).parents(".row");
			panel.remove();
			
			i = ($("#ponencias .row").length);
			
			SetTextTitle();
		}
	});
}

function SetTextTitle() {
	var k = 1;
	
	$("#ponencias .row label").each(function() {
		$(this).text("Ponencia " + k + ". Título de la ponencia en inglés y español");
		k++;
	});
}

function DrawCoauthor() {
	$('a[aria-controls="coautores"]').on('shown.bs.tab', function (e) {
		var panel;
		var aria = "true";
		var collapse = "in";
		var collapsed = "";
		var ca = $("#hdnTotalCoautores").val();
		
		if ( ca == "" ) {
			//$("#coautores").html("");
		}
		
		for ( var x=1; x<i; x++ ) {
			z[x] = 2;
			if ( x > 1 ) {
				aria = "false";
				collapse = "";
				collapsed = "collapsed";
			}
			
			panel = '<div class="panel-group ficha-collapse" id="accordion-c'+x+'">';
			panel += '<div class="panel panel-default">';
			panel += '<div class="panel-heading">';
			panel += '<h4 class="panel-title">';
			panel += '<a data-parent="#accordion-c'+x+'" data-toggle="collapse" href="#panel-c'+x+'" aria-expanded="'+aria+'" aria-controls="panel-c'+x+'">';
			panel += 'Ponencia '+x;
			panel += '</a>';
			panel += '</h4>';
			panel += '<button type="button" class="collpase-button '+collapsed+'" data-parent="#accordion-c'+x+'" data-toggle="collapse" href="#panel-c'+x+'"></button>';
			panel += '</div>';
			panel += '<div class="panel-collapse collapse '+collapse+'" id="panel-c'+x+'">';
			panel += '<div class="panel-body">';
			panel += '<button id="btnAgregarCoautor'+x+'" data-c="'+x+'" class="btn btn-sm btn-primary btnAgregarCoautor">';
			panel += '<span class="glyphicon glyphicon-plus"></span> Agregar coautor';
			panel += '</button>';
			panel += '<div class="coauth"><div>';
			panel += '<h5>Coautor 1</h5> ';
			panel += '<a href="#"><span class="glyphicon glyphicon-trash"></span></a>';
			panel += '</div>';
			panel += '<div class="row">';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Nombre(s):</label>';
			panel += '<input type="text" id="coNombre'+x+'_1" name="coNombre_'+x+'[]" class="form-control" placeholder="Nombre del coautor" />';
			panel += '</div>';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Primer apellido:</label>';
			panel += '<input type="text" id="coApP'+x+'_1" name="coApP_'+x+'[]" class="form-control" placeholder="Primer apellido del coautor" />';
			panel += '</div>';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Segundo apellido:</label>';
			panel += '<input type="text" id="coApM'+x+'_1" name="coApM_'+x+'[]" class="form-control" placeholder="Segundo apellido del coautor" />';
			panel += '</div></div></div>';  //.row
			panel += '</div></div>';  // .panel-body y .collapse
			panel += '</div>';  // .panel
			panel += '</div>';  // .ficha-collapse
			
			if ( ca == "" ) {
				$("#coautores").append(panel);
			}
			
			DeleteCoauthor();
		}
		
		$(".btnAgregarCoautor").click(function(e) {
			e.preventDefault();
			
			var idC = $(this).data("c");
			var coautor = "";
			var elem = $(this).parent(".panel-body");
			
			if ( z[(idC)] < 4 ) {
				coautor = '<div class="coauth"><div>';
				coautor += '<h5>Coautor '+z[(idC)]+'</h5> ';
				coautor += '<a href="#"><span class="glyphicon glyphicon-trash"></span></a>';
				coautor += '</div>';
				coautor += '<div class="row">';
				coautor += '<div class="form-group col-sm-4">';
				coautor += '<label>Nombre(s):</label>';
				coautor += '<input type="text" id="coNombre'+idC+'_'+z[(idC)]+'" name="coNombre_'+idC+'[]" class="form-control" placeholder="Nombre del coautor" />';
				coautor += '</div>';
				coautor += '<div class="form-group col-sm-4">';
				coautor += '<label>Primer apellido:</label>';
				coautor += '<input type="text" id="coApP'+idC+'_'+z[(idC)]+'" name="coApP_'+idC+'[]" class="form-control" placeholder="Primer apellido del coautor" />';
				coautor += '</div>';
				coautor += '<div class="form-group col-sm-4">';
				coautor += '<label>Segundo apellido:</label>';
				coautor += '<input type="text" id="coApM'+idC+'_'+z[(idC)]+'" name="coApM_'+idC+'[]" class="form-control" placeholder="Segundo apellido del coautor" />';
				coautor += '</div></div></div>';  //.row
				
				$(elem).append(coautor);
				z[idC]++;
				
				DeleteCoauthor();
			}
		});
	});
}

function DeleteCoauthor() {
	$("#coautores div h5 + a").click(function(e) {
		e.preventDefault();
		
		if ( 3 > 2 ) {
			var panel = $(this).parents("div.coauth");
			panel.remove();
			
			//i = ($("#ponencias .row").length);
			
			SetTextCoauthor();
		}
	});
}

function SetTextCoauthor() {
	$("#coautores .panel-group").each(function() {
		var k = 1;
		
		$(this).find(".coauth h5").each(function(index) {
			$(this).text("Coautor " + k);
			k++;
		});
	});
}

function SaveData() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formPonencia").valid() ) {
			$.post(
				'/ponencia/guardar', 
				$("#formPonencia").serialize(), 
				function(data) {
					$("#idSolicitud").val(data);
					
					$.post(
						'/ponencia/datos-ponencia', 
						$("#formPonencia").serialize(), 
						function(dp) {
							var p = $.parseJSON(dp);
							
							$.post(
								'/ponencia/coautores', 
								$("#formPonencia").serialize() + '&idPonencias=' + p, 
								function(data) {}
							);
						}
					);
					
					$.post(
						'/ponencia/montos', 
						$("#formPonencia").serialize(), 
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
	
	$("#formPonencia").validate({
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
			evento: {
				required: true
			},
			idioma: {
				required: true
			},
			sede: {
				required: true
			},
			lugar: {
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
			"tituloPonencia[]": {
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
			estancia: {
				moneda: true
			},
			inscripcion: {
				moneda: true
			},
			otrosGastos: {
				moneda: true
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
	AddSpeechTitle();
	DeleteSpeechTitle();
	DrawCoauthor();
	SaveData();
	Validate();
	
	var total = $("#hdnTotalTitulos").val();
	
	if ( total > 2 ) {
		i = total;
	}
	
	if ( $("#rdbLI").is(":checked") ) {
		$(".oculto").css("display", "block");
	}
});