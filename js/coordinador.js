function Init() {
	$(".datepicker").datepicker();
	
	$('[data-toggle="tooltip"]').tooltip();
	
	$("#emailConf").on("cut copy paste", function(e) {
		e.preventDefault();
	});
	
	$("#curp").displayAsUppercase();
}

function AddOrganizer() {
	var i = 2;
	
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
			exp += '</a>';
			exp += '</h4>';
			exp += '<button type="button" class="collpase-button collapsed" data-parent="#accordion'+i+'" data-toggle="collapse" href="#panel-'+i+'"></button>';
			exp += '</div>';
			exp += '<div class="panel-collapse collapse in" id="panel-'+i+'">';
			exp += '<div class="panel-body">';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Nombre(s):</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Primer apellido</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-4">';
			exp += '<label>Segundo apellido</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Procedencia</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Trabajo actual</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Licenciatura</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Maestría</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Doctorado</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Especialidad</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Actividad del expositor</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Tema a exponer</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '</div>';
			exp += '<div class="row">';
			exp += '<div class="form-group col-sm-6">';
			exp += '<label>Horario</label>';
			exp += '<input type="text" id="" name="" class="form-control" />';
			exp += '</div>';
			exp += '</div>';
			exp += '</div>';
			exp += '</div>';
			exp += '</div>';
			exp += '</div>';
			elem.after(exp);
			
			$(".panel-collapse").each(function() {
				if ( "panel-"+i != $(this).attr("id") ) {
					$(this).collapse('hide');
				}
			});

			i++;
		}
	});
}

function SaveData() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		if ( $("#formCoordinador").valid() ) {
			$.post(
				'/coordinador/editar', 
				$("#formCoordinador").serialize(), 
				function (data) {}
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
	$.validator.methods.email = function( value, element ) {
		return this.optional( element ) || /[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+/.test( value );
	}
	
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formCoordinador").validate({
		ignore: [],
		errorElement: "span",
		errorClass: "help-block",
		errorPlacement: function(error, element) {
			if ( element.attr("name") == "rPerfil" ) {
		        error.insertAfter(".tipo-perfil");
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
			nombre: {
				required: true
			},
			apPaterno: {
				required: true
			},
			fechaNac: {
				required: true
			},
			curp: {
				required: true,
				minlength: 18,
			},
			sexo: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			emailConf: {
				required: true,
				equalTo: "#email"
			},
			telefono: {
				required: true,
				digits: true,
				minlength: 10
			},
			extension: {
				required: true,
				digits: true,
				minlength: 3,
				maxlength: 6
			},
			escuela: {
				required: true
			},
			banco: {
				required: true
			},
			sucursal: {
				required: true,
				digits: true
			},
			cuentaBanco: {
				required: true,
				digits: true
			},
			clabe: {
				required: true,
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
	SaveData();
	Validate();
});