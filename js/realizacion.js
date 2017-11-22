var i = 2;

function Init() {
	$(".datepicker").datepicker();
	
	$('[data-toggle="tooltip"]').tooltip();
}

function AddOrganizer() {
	var total = $("#hdnTotalExp").val();
	
	if ( total > 2 ) {
		i = total;
	}
	
	$("#btnAgregarExpositor").click(function(e) {
		e.preventDefault();
		
		var exp;
		var elem = $(this).parents(".tab-pane").children(".ficha-collapse").last();
		
		if ( i < 11 ) {
			exp = '<div class="panel-group ficha-collapse" id="accordion'+i+'">';
			exp += '<div class="panel panel-default">';
			exp += '<div class="panel-heading">';
			exp += '<h4 class="panel-title">';
			exp += '<a data-parent="#accordion'+i+'" data-toggle="collapse" href="#panel-'+i+'" aria-expanded="true" aria-controls="panel-'+i+'">';
			exp += 'Expositor '+i;
			exp += '</a> ';
			exp += '<a href="#"><span class="glyphicon glyphicon-trash"></span></a>';
			exp += '</h4>';
			exp += '<button type="button" class="collpase-button collapsed" data-parent="#accordion'+i+'" data-toggle="collapse" href="#panel-'+i+'"></button>';
			exp += '</div>';
			exp += '<div class="panel-collapse collapse in" id="panel-'+i+'">';
			exp += '<div class="panel-body">';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Nombre(s)<span class="form-text">*</span>:</label>';
			exp += '<input type="text" id="exNombre'+i+'" name="exNombre[]" class="form-control" placeholder="Ingresa el nombre del expositor" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Primer apellido<span class="form-text">*</span>:</label>';
			exp += '<input type="text" id="exApP'+i+'" name="exApP[]" class="form-control" placeholder="Ingresa el primer apellido" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Segundo apellido:</label>';
			exp += '<input type="text" id="exApM'+i+'" name="exApM[]" class="form-control" placeholder="Ingresa el segundo apellido" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-8">';
			exp += '<label>Procedencia:</label>';
			exp += '<input type="text" id="exProcedencia'+i+'" name="exProcedencia[]" class="form-control" placeholder="Ingresa la procedencia del expositor" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Trabajo actual:</label>';
			exp += '<input type="text" id="exOcupacion'+i+'" name="exOcupacion[]" class="form-control" placeholder="Ingresa el trabajo actual del expositor" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Licenciatura:</label>';
			exp += '<input type="text" id="exLicenciatura'+i+'" name="exLicenciatura[]" class="form-control" placeholder="Estudios de licenciatura" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Maestría:</label>';
			exp += '<input type="text" id="exMaestria'+i+'" name="exMaestria[]" class="form-control" placeholder="Estudios de maestría" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Doctorado:</label>';
			exp += '<input type="text" id="exDoctorado'+i+'" name="exDoctorado[]" class="form-control" placeholder="Estudios de doctorado" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Especialidad:</label>';
			exp += '<input type="text" id="exEspecialidad'+i+'" name="exEspecialidad[]" class="form-control" placeholder="Estudios de especialidad" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-8">';
			exp += '<label>Actividad del expositor:</label>';
			exp += '<input type="text" id="exActividad'+i+'" name="exActividad[]" class="form-control" placeholder="Actividad del expositor" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-8">';
			exp += '<label>Tema a exponer:</label>';
			exp += '<input type="text" id="exTema'+i+'" name="exTema[]" class="form-control" placeholder="Tema a exponer" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Horario:</label>';
			exp += '<input type="text" id="exHorario'+i+'" name="exHorario[]" class="form-control" placeholder="Horario de la exposición" />';
			exp += '</div>';
			exp += '</div>';
			exp += '</div>';
			exp += '</div>';
			exp += '</div>';
			exp += '</div>';
			
			if ( elem.length > 0 ) {
				elem.after(exp);
			} else {
				$("#expositores > .row").after(exp);
			}
			
			$(".panel-collapse").each(function() {
				if ( "panel-"+i != $(this).attr("id") ) {
					$(this).collapse('hide');
				}
			});

			i++;
			
			DeleteOrganizer();
		}
	});
}

function DeleteOrganizer() {
	$("#expositores .panel-title a:last-of-type").click(function(e) {
		e.preventDefault();
		
		var panel = $(this).parents(".panel-group");
		panel.remove();
		
		i = ($("#expositores .panel-group").length) + 1;
		
		SetTextTitle();
	});
}

function SetTextTitle() {
	var k = 1;
	
	$("#expositores .panel-title a:first-of-type").each(function() {
		$(this).text("Expositor " + k);
		k++;
	});
}

function SaveData() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formRealizacion").valid() ) {
			$.post(
				'/realizacion/guardar', 
				$("#formRealizacion").serialize(), 
				function(data) {
					$("#idSolicitud").val(data);
					
					$.post(
						'/realizacion/expositores', 
						$("#formRealizacion").serialize(), 
						function(data) {}
					);
					
					$.post(
						'/realizacion/montos', 
						$("#formRealizacion").serialize(), 
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
	
	$("#formRealizacion").validate({
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
			idioma: {
				required: true
			},
			sede: {
				required: true
			},
			fechaInicio: {
				required: true
			},
			fechaFin: {
				required: true
			},
			tParticipantes: {
				required: true,
				digits: true
			},
			tExpositores: {
				required: true,
				digits: true
			},
			duracion: {
				required: true,
				digits: true
			},
			dirigido: {
				required: true
			},
			objetivo: {
				required: true
			},
			beneficio: {
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

$gmx(document).ready(function() {
	Init();
	AddOrganizer();
	DeleteOrganizer();
	SaveData();
	Validate();
});