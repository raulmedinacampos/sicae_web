var i = 2

function Init() {
	$(".datepicker").datepicker();
	
	$('textarea[placeholder]').placeholder();
}

function AddSpeechTitle() {
	$("#btnAgregarPonencia").click(function(e) {
		e.preventDefault();
		
		var input;
		var elem = $(this).parents(".tab-pane").children(".row").last();
		
		if ( i < 4 ) {
			input = '<div class="row">';
			input += '<div class="form-group col-sm-12">';
			input += '<label>Ponencia '+i+'. Título de la ponencia en inglés y español</label>';
			input += '<textarea id="tituloPonencia'+i+'" name="tituloPonencia'+i+'" rows="3" class="form-control" placeholder="Anote el nombre de su ponencia en inglés y en español separados por un salto de línea."></textarea>';
			input += '</div></div>';
			elem.after(input);
			i++;
		}
	});
}

function DrawCoauthor() {
	$('a[aria-controls="coautores"]').on('shown.bs.tab', function (e) {
		var panel;
		var aria = "true";
		var collapse = "in";
		var collapsed = "";
		var z = new Array();
		
		$("#coautores").html("");
		
		for ( x=1; x<i; x++ ) {
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
			panel += '<h5>Coautor 1</h5>';
			panel += '<div class="row">';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Nombre(s):</label>';
			panel += '<input type="text" id="coNombre'+x+'_1" name="coNombre'+x+'_1" class="form-control" placeholder="Nombre del autor" />';
			panel += '</div>';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Primer apellido:</label>';
			panel += '<input type="text" id="coApP'+x+'_1" name="coApP'+x+'_1" class="form-control" placeholder="Primer apellido del autor" />';
			panel += '</div>';
			panel += '<div class="form-group col-sm-4">';
			panel += '<label>Segundo apellido:</label>';
			panel += '<input type="text" id="coApM'+x+'_1" name="coApM'+x+'_1" class="form-control" placeholder="Segundo apellido del autor" />';
			panel += '</div></div>';  //.row
			panel += '</div></div>';  // .panel-body y .collapse
			panel += '</div>';  // .panel
			panel += '</div>';  // .ficha-collapse
			$("#coautores").append(panel);
			
			
		}
		
		$(".btnAgregarCoautor").click(function(e) {
			e.preventDefault();
			
			var idC = $(this).data("c");
			var coautor = "";
			var elem = $(this).parent(".panel-body");
			
			if ( z[(idC)] < 4 ) {
				coautor = '<h5>Coautor '+z[(idC)]+'</h5>';
				coautor += '<div class="row">';
				coautor += '<div class="form-group col-sm-4">';
				coautor += '<label>Nombre(s):</label>';
				coautor += '<input type="text" id="coNombre'+idC+'_'+z[(idC)]+'" name="coNombre'+idC+'_'+z[(idC)]+'" class="form-control" placeholder="Nombre del autor" />';
				coautor += '</div>';
				coautor += '<div class="form-group col-sm-4">';
				coautor += '<label>Primer apellido:</label>';
				coautor += '<input type="text" id="coApP'+idC+'_'+z[(idC)]+'" name="coApP'+idC+'_'+z[(idC)]+'" class="form-control" placeholder="Primer apellido del autor" />';
				coautor += '</div>';
				coautor += '<div class="form-group col-sm-4">';
				coautor += '<label>Segundo apellido:</label>';
				coautor += '<input type="text" id="coApM'+idC+'_'+z[(idC)]+'" name="coApM'+idC+'_'+z[(idC)]+'" class="form-control" placeholder="Segundo apellido del autor" />';
				coautor += '</div></div>';  //.row
				
				$(elem).append(coautor);
				z[idC]++;
			}
		});
	});
}

$(function() {
	Init();
	AddSpeechTitle();
	DrawCoauthor();
});