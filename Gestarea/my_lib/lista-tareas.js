$(document).ready(function () {
	$("#ordenar").change(function () {
		$.ajax({
			url: "/Gestarea/controlador/ordenarTareas.php?ordenar="+$(this).val()+"&dni="+$("#hiddenID").val(),
			type: "GET",
			async: false,
			success: function (data) {
				$("#listaTareas").html(data);
			}
		});
	});
	
});
