function Init() {
	$("#registros").DataTable({
		"fnDrawCallback": function(oSettings) {
			// Muestra u oculta paginación
			if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) {
				$(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
			}
	    },
	    "oLanguage": {
            "sSearch": "Filtrar: ",
            "oPaginate": {
	            "sPrevious": "&#171;",
	            "sNext": "&#187;"
		    },
		    "sInfo": "Registros _START_ de _END_ de un total de _TOTAL_",
		    "sZeroRecords": "No se encontraron resultados"
	    },
	    "bLengthChange": false,
		"pageLength": 15
	});
}

function SendForm() {
	$("table tr td:last-of-type a").click(function(e) {
		e.preventDefault();
		
		var id = $(this).data("id");
		
		$("#hdnID").val(id);
		
		$("#formFormato").submit();
	});
}


$(function() {
	Init();
	SendForm();
});