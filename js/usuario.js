function Init() {
	$(".datepicker").datepicker();
	
	$('[data-toggle="tooltip"]').tooltip();
	
	$("#emailConf, #passwordConf").on("cut copy paste", function(e) {
		e.preventDefault();
	});
	
	$("#curp, #rfc").displayAsUppercase();
	
	$("#password, #passwordConf").password({
		message: "Haga click aquí para ver u ocultar la contraseña"
	});
	
	$("#panel-base, #panel-interinato, #panel-sabatico, #panel-sueldo").css("display", "none");
	
	$('textarea[placeholder]').placeholder();
}

function TooglePasswordFields() {
	$("#chkPass").click(function() {
		if ( $(this).is(":checked") ) {
			$("div.oculto").css("display", "block");
		} else {
			$("div.oculto").css("display", "none");
			$("#password").val("");
			$("#passwordConf").val("");
		}
	});
}

function ToggleProfData() {
	$("#tipoNombramiento").change(function() {
		var val = $(this).val();
		
		if ( val == 1 || val == 3 ) {
			$("#panel-base").css("display", "block");
			$("#panel-interinato").css("display", "none");
		}
		
		if ( val == 2 ) {
			$("#panel-base").css("display", "none");
			$("#panel-interinato").css("display", "block");
		}
	});
	
	$('input[name="sabatico"]').change(function() {
		var val = $(this).val();
		
		if ( val == 1 ) {
			$("#panel-sabatico").css("display", "block");
		} else {
			$("#panel-sabatico").css("display", "none");
		}
	});
	
	$('input[name="sueldo"]').change(function() {
		var val = $(this).val();
		
		if ( val == 1 ) {
			$("#panel-sueldo").css("display", "block");
		} else {
			$("#panel-sueldo").css("display", "none");
		}
	});
}

function CalculateTesis() {
	var ctl = $("#cTLicenciatura");
	var itl = $("#iTLicenciatura");
	var ctm = $("#cTMaestria");
	var itm = $("#iTMaestria");
	var ctd = $("#cTDoctorado");
	var itd = $("#iTDoctorado");
	
	$("#cTLicenciatura, #iTLicenciatura").keyup(function() {
		if ( $("#cTLicenciatura").val() && $("#iTLicenciatura").val() ) {
			var suma = parseInt($("#cTLicenciatura").val()) + parseInt($("#iTLicenciatura").val());
			$("#tTLicenciatura").val(suma);
		}
	});
	
	$("#cTMaestria, #iTMaestria").keyup(function() {
		if ( $("#cTMaestria").val() && $("#iTMaestria").val() ) {
			var suma = parseInt($("#cTMaestria").val()) + parseInt($("#iTMaestria").val());
			$("#tTMaestria").val(suma);
		}
	});
	
	$("#cTDoctorado, #iTDoctorado").keyup(function() {
		if( $("#cTDoctorado").val() && $("#iTDoctorado").val() ) {
			var suma = parseInt($("#cTDoctorado").val()) + parseInt($("#iTDoctorado").val());
			$("#tTDoctorado").val(suma);
		}
	});
}

function EnableProjectDesc() {
	$(".tipoProy").change(function() {
		var p = $(this).parents(".panel-body");
		var input = p.find(".otro");
		
		if ( $(this).val() == "Otros" ) {
			input.prop("readonly", false);
		} else {
			input.prop("readonly", true);
		}
	});
}

function SaveData() {
	$("#btnGuardar").click(function(e) {
		e.preventDefault();
		
		var perfil = $("#hdnTipo").val();
		
		if ( $("#formUsuario").valid() ) {
			$.post(
				'/usuario/editar', 
				$("#formUsuario").serialize(), 
				function (data) {}
			);
			
			if ( perfil == 1 ) {  // Profesor
				$.post(
					'/usuario/datos-profesor', 
					$("#formUsuario").serialize(), 
					function (data) {}
				);
				
				$.post(
					'/usuario/direcciones', 
					$("#formUsuario").serialize(), 
					function (data) {}
				);
				
				$.post(
					'/usuario/proyectos', 
					$("#formUsuario").serialize(), 
					function (data) {}
				);
			}
			
			if ( perfil == 3 ) {  // Alumno
				$.post(
					'/usuario/datos-alumno', 
					$("#formUsuario").serialize(), 
					function (data) {}
				);
			}
			
			$.post(
				'/usuario/grados-academicos', 
				$("#formUsuario").serialize(), 
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
	
	$.validator.addMethod("promedio", function(value, element) {
	    return this.optional(element) || /^\d{0,3}(\.\d{0,2})?$/i.test(value);
	}, "Ingresa un número válido");
	
	$.extend($.validator.messages, {
		  required: "Este campo es obligatorio.",
		  digits: "Deben ser solo números"
	});
	
	$("#formUsuario").validate({
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
			rPerfil: {
				required: true
			},
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
			rfc: {
				required: true,
				minlength: 10
			},
			sexo: {
				required: true
			},
			nacionalidad: {
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
				minlength: 5
			},
			escuela: {
				required: true
			},
			password: {
				required: "#chkPass:checked",
				minlength: 8
			},
			passwordConf: {
				required: "#chkPass:checked",
				equalTo: "#password"
			},
			tipoNombramiento: {
				required: true
			},
			fechaBase: {
				required: function(element) {
					return $("#tipoNombramiento").val() == "1" || $("#tipoNombramiento").val() == "3";
				}
			},
			categoria: {
				required: function(element) {
					return $("#tipoNombramiento").val() == "1" || $("#tipoNombramiento").val() == "3";
				}
			},
			plaza: {
				required: function(element) {
					return $("#tipoNombramiento").val() == "1" || $("#tipoNombramiento").val() == "3";
				}
			},
			horas: {
				required: function(element) {
					return $("#tipoNombramiento").val() == "1" || $("#tipoNombramiento").val() == "3";
				}
			},
			fechaInicioInt: {
				required: function(element) {
					return $("#tipoNombramiento").val() == "2";
				}
			},
			fechaFinInt: {
				required: function(element) {
					return $("#tipoNombramiento").val() == "2";
				}
			},
			numEmpleado: {
				required: true
			},
			fechaIngreso: {
				required: true
			},
			excelencia: {
				required: true
			},
			sabatico: {
				required: true
			},
			tipoSabatico: {
				required: function(element) {
					return $('input[name="sabatico"]:checked').val() == "1";
				}
			},
			fechaInicioSab: {
				required: function(element) {
					return $('input[name="sabatico"]:checked').val() == "1";
				}
			},
			fechaFinSab: {
				required: function(element) {
					return $('input[name="sabatico"]:checked').val() == "1";
				}
			},
			sueldo: {
				required: true
			},
			fechaInicioGoce: {
				required: function(element) {
					return $('input[name="sueldo"]:checked').val() == "1";
				}
			},
			fechaFinGoce: {
				required: function(element) {
					return $('input[name="sueldo"]:checked').val() == "1";
				}
			},
			prorroga: {
				required: function(element) {
					return $('input[name="sueldo"]:checked').val() == "1";
				}
			},
			fechaInicioProrroga: {
				required: function(element) {
					return $('input[name="prorroga"]:checked').val() == "1";
				}
			},
			fechaFinProrroga: {
				required: function(element) {
					return $('input[name="prorroga"]:checked').val() == "1";
				}
			},
			edd: {
				required: true
			},
			exclusividad: {
				required: true
			},
			edi: {
				required: true
			},
			sni: {
				required: true
			},
			boleta: {
				required: true
			},
			semestre: {
				required: true,
				digits: true,
				maxlength: 2
			},
			promedio: {
				required: true,
				promedio: true
			},
			materiasCursa: {
				required: true
			},
			pifi: {
				required: true
			},
			conacyt: {
				required: true
			},
			numSIP: {
				required: true
			},
			escuelaSIP: {
				required: true
			},
			directorSIP: {
				required: true
			},
			materiasImp: {
				required: true
			},
			unidAprendizaje: {
				required: true
			},
			banco: {
				required: true
			},
			sucursal: {
				required: true,
				digits: true,
				maxlength: 6
			},
			cuentaBanco: {
				required: true,
				digits: true,
				maxlength: 15
			},
			clabe: {
				required: true
			}
		},
		messages: {
			rPerfil: "Seleccione un tipo de usuario",
			curp: {
				minlength: "El CURP es incorrecto"
			},
			rfc: {
				minlength: "El RFC es incorrecto"
			},
			email: {
				email: "El correo es incorrecto"
			},
			emailConf: "El correo no coincide",
			telefono: {
				minlength: "El número telefónico debe ser de 10 dígitos"
			},
			extension: {
				minlength: "La extensión debe ser de 5 dígitos"
			},
			password: {
				minlength: "La contraseña debe tener por lo menos 8 caracteres"
			},
			passwordConf: "La contraseña no coincide",
			semestre: {
				maxlength: "El semestre no puede ser de más de dos dígitos"
			},
			unidAprendizaje: {
				maxlength: "El texto no debe exceder los 100 caracteres"
			},
			sucursal: {
				maxlength: "El número de sucursal no puede de más de seis dígitos"
			},
			clabe: {
				maxlength: "Deben ser 18 dígitos"
			}
		}
	});
	
	/*$("#espTP6").rules("add", {
		required: function(element) {
			return $("#tipoProyecto6").val() == "Otros";
		}
	});
	
	$("#registro6").rules("add", {
		required: function(element) {
			return $("#tipoProyecto6").val() != "";
		}
	});
	
	$("#tParticipacion6").rules("add", {
		required: function(element) {
			return $("#tipoProyecto6").val() != "";
		}
	});
	
	$("#espTP7").rules("add", {
		required: function(element) {
			return $("#tipoProyecto7").val() == "Otros";
		}
	});
	
	$("#registro7").rules("add", {
		required: function(element) {
			return $("#tipoProyecto7").val() != "";
		}
	});
	
	$("#tParticipacion7").rules("add", {
		required: function(element) {
			return $("#tipoProyecto7").val() != "";
		}
	});
	
	$("#espTP8").rules("add", {
		required: function(element) {
			return $("#tipoProyecto8").val() == "Otros";
		}
	});
	
	$("#registro8").rules("add", {
		required: function(element) {
			return $("#tipoProyecto8").val() != "";
		}
	});
	
	$("#tParticipacion8").rules("add", {
		required: function(element) {
			return $("#tipoProyecto8").val() != "";
		}
	});*/
}

$gmx(document).ready(function() {
	Init();
	TooglePasswordFields();
	ToggleProfData();
	CalculateTesis();
	EnableProjectDesc();
	SaveData();
	Validate();
	
	$("#tipoNombramiento").trigger("change");
	$('input[name="sabatico"]:checked').trigger("change");
	$('input[name="sueldo"]:checked').trigger("change");
	
	$("#tipoProyecto6").trigger("change");
	$("#tipoProyecto7").trigger("change");
	$("#tipoProyecto8").trigger("change");
	
	if ( $("#tipoProyecto7").val() != "" ) {
		var h = $("#proyectos").find('a[href="#panel-7"]');
		h.trigger("click");
	}
	
	if ( $("#tipoProyecto8").val() != "" ) {
		var h = $("#proyectos").find('a[href="#panel-8"]');
		h.trigger("click");
	}
});