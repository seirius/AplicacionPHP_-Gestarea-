$(document).ready(function ($) {
	$("input:checkbox").click(function () {
		var inputs = $(this).parent().parent().find("input:text");
		if ($(this).prop("checked")) {
			$(inputs).prop( "disabled", false );
		} else {
			$(inputs).prop( "disabled", true );
		}
	}); 
	
	var validator = $("#crearTareaForm").bootstrapValidator({
		feedbackIcons: {
			valid: "glyphicon glyphicon-ok",
			invalid: "glyphicon glyphicon-remove", 
			validating: "glyphicon glyphicon-refresh"
		}, 
        fields: {
        	fechaStart: {
        		validators: {
        			notEmpty: {
        				message: "Fecha de inicio requerida"
        			},
        			date: {
        				message: "La fecha debe tener este formato YYYY-MM-DD",
        				format: "YYYY-MM-DD"
        			}
        		}
        	},
        	horaStart: {
        		validators: {
        			notEmpty: {
        				message: "Hora de inicio requerida"
        			},
        			regexp: {
        				message: "La hora debe tener este formato HH:MM",
        				regexp: /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/
        			}
        		}
        	},
        	fechaFin: {
        		validators: {
        			notEmpty: {
        				message: "Fecha de finalizacion requerida"
        			},
        			date: {
        				message: "La fecha debe tener este formato YYYY-MM-DD",
        				format: "YYYY-MM-DD"
        			},
        			callback: {
        				message: "Fecha de finalizacion no puede ser menor que la de inicio",
        				callback: function () {
        					var fechaInicio = $("#fechaStart").val();
        					var horaInicio = $("#horaStart").val();
        					var fechaFin = $("#fechaFin").val();
        					var horaFin = $("#horaFin").val();
        					return checkDates(fechaInicio, horaInicio, fechaFin, horaFin);
        				}
        			}
        		}
        	},
        	horaFin: {
        		validators: {
        			notEmpty: {
        				message: "Hora de finalizacion requerida"
        			},
        			regexp: {
        				message: "La hora debe tener este formato HH:MM",
        				regexp: /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/
        			},
        			callback: {
        				message: "Fecha de finalizacion no puede ser menor que la de inicio",
        				callback: function () {
        					var fechaInicio = $("#fechaStart").val();
        					var horaInicio = $("#horaStart").val();
        					var fechaFin = $("#fechaFin").val();
        					var horaFin = $("#horaFin").val();
        					return checkDates(fechaInicio, horaInicio, fechaFin, horaFin);
        				}
        			}
        		}
        	},
        	descripcion: {
        		validators: {
        			notEmpty: {
        				message: "Descripcion requerida"
        			}
        		}
        	},
        	"usuarioHoras[]": {
        		validators: {
        			notEmpty: {
        				message: "Las horas de usuario son requeridas"
        			},
        			integer: {
        				message: "El numero no es un entero"
        			}
        		}
        	},
        	"usuarioLabor[]": {
        		validators: {
        			notEmpty: {
        				message: "La labor de usuario es requerida"
        			}
        		}
        	}
        }
	});
	
	$("#fechaStart").datepicker({
		dateFormat: 'yy-mm-dd',
		onSelect: function(date, inst) {
			$("#crearTareaForm").bootstrapValidator("revalidateField", "fechaStart");
			if ($("#fechaFin").val() !== "") {
				$("#crearTareaForm").bootstrapValidator("revalidateField", "fechaFin");
			}
			
			if ($("#horaFin").val() !== "") {
				$("#crearTareaForm").bootstrapValidator("revalidateField", "horaFin");
			}
		}
	});
	
	$("#fechaFin").datepicker({
		dateFormat: "yy-mm-dd",
		onSelect: function(date, isnt) {
			$("#crearTareaForm").bootstrapValidator("revalidateField", "fechaFin");
			
			if ($("#horaFin").val() !== "") {
				$("#crearTareaForm").bootstrapValidator("revalidateField", "horaFin");
			}
		}
	});
	
	$("#horaStart").timepicker({
		onSelect: function(date, isnt) {
			$("#crearTareaForm").bootstrapValidator("revalidateField", "horaStart");
		}
	});
	
	$("#horaFin").timepicker({
		onSelect: function(date, isnt) {
			$("#crearTareaForm").bootstrapValidator("revalidateField", "horaFin");
			$("#crearTareaForm").bootstrapValidator("revalidateField", "fechaFin");
		}
	});
});


function checkDates(fechaInicio, horaInicio, fechaFin, horaFin) {
	if ( !(typeof fechaInicio === "") && !(typeof horaInicio === "") &&
			!(typeof fechaFin === "") && !(typeof horaFin === "")) {
		var fechaStart = new Date(fechaInicio + " " + horaInicio);
		var fechaEnd = new Date(fechaFin + " " + horaFin);
		var diferencia = fechaEnd - fechaStart;
		if (diferencia > 0) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}