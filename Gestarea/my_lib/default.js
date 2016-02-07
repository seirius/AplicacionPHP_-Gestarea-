$(document).ready(function ($) {
	$(".clickable").click(function() {
		window.document.location = $(this).data("href");
	});
	$(".fecha").datepicker({
		dateFormat: 'yy-mm-dd'
	});
	$(".hora").timepicker();
});
