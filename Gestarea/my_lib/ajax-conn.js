$(document).ready(function () {
	$("#buscar").keyup(function () {
		var val = $(this).val();
		$.ajax({
			url: '/Contactos/resultado-contactos.php?orden=6&buscar='+val,
			type:'POST',
			async: false,
			success: function(data) {
				$("#tableBody").html(data);
			}
		});
		
		$(".clickable-row").click(function() {
			window.document.location = $(this).data("href");
		});
		
	});
	
	$(".orderable-col").click(function() {
		$.ajax({
			url: $(this).data("href"),
			type:'POST',
			async: false,
			success: function(data) {
				$("#tableBody").html(data);
			}
		});

		$(".clickable-row").click(function() {
			window.document.location = $(this).data("href");
		});
	});
});















