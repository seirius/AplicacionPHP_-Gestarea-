$(document).ready(function () {
	$("#buscarForm").submit(function (event) {
		event.preventDefault();
		var buscarValor = $("#buscar").val();
		if (buscarValor.length > 0) {
			$.ajax({
				url: "/Gestarea/controlador/busqueda.php",
				type: "POST",
				async: false,
				data: {
					buscar : buscarValor
				},
				success: function (data) {
					$("#resultadoBusqueda").html(data);
				}
			});
			$("#acordeon-ui").accordion();
			$(".clickable").click(function() {
				window.document.location = $(this).data("href");
			});
		}
	});
	
});