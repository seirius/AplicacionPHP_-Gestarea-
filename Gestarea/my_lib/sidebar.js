$(document).ready(function($) {
	$(".close-session").click(function() {
		$.ajax({
			url: '/Gestarea/controlador/cerrar-sesion.php',
			type:'POST',
			async: false
		});
		window.document.location = $(this).data("href");
	});
});