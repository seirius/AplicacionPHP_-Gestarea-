$(document).ready(function () {
	var validator = $("#modificarPerfilForm").bootstrapValidator({
		feedbackIcons: {
			valid: "glyphicon glyphicon-ok",
			invalid: "glyphicon glyphicon-remove", 
			validating: "glyphicon glyphicon-refresh"
		}, 
        fields: {
        	nombre: {
        		validators: {
        			notEmpty: {
        				message: "Nombre requerido"
        			},
        			stringLength: {
        				min: 5,
        				message: "Nombre tiene que tener al menos 5 caracteres" 
        			}
        		}
        	},
        	cargo: {
        		validators: {
        			notEmpty: {
        				message: "Se tiene que seleccionar un cargo"
        			}
        		}
        	}
        }
	});
	
	validator.on("success.form.bv", function (e) {
		//Prevenir el submit de form
		e.preventDefault();
		//Mostrar mensaje de exito
		$("#panel-modificar").removeClass("panel-info");
		$("#panel-modificar").addClass("panel-success");
		$("#panel-modificar-titulo").html("Modificado con exito!");
		
		//Enviar el formulario
		var $form = $(e.target),
		fv    = $form.data('formValidation');
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize()
		});
	});
	
	$("#boton-cancelar").click(function () {
		resetModificacion();
	});
	
	var validator = $("#formComprobar").bootstrapValidator({
		feedbackIcons: {
			valid: "glyphicon glyphicon-ok",
			invalid: "glyphicon glyphicon-remove", 
			validating: "glyphicon glyphicon-refresh"
		}, 
        fields: {
        	password: {
        		validators: {
        			notEmpty: {
        				message: "Contraseña requerida"
        			}
        		}
        	}
        }
	});
	
	validator.on("success.form.bv", function (e) {
		//Prevenir el submit de form
		e.preventDefault();
		
		//Enviar el formulario
		var $form = $(e.target),
		fv    = $form.data('formValidation');
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize(),
			success: function (data) {
				if (data == 1) {
					$("#formComprobar").addClass("hidden");
					$("#formCambiarPassword").removeClass("hidden");
				} else if (data == 0) {
					$("#panel-comprobar").removeClass("panel-warning").addClass("panel-danger");
					$("#panel-comprobar-titulo").html("Contraseña erronea!");
				}
			}
		});
	});
	
	var validator = $("#formCambiarPassword").bootstrapValidator({
		feedbackIcons: {
			valid: "glyphicon glyphicon-ok",
			invalid: "glyphicon glyphicon-remove", 
			validating: "glyphicon glyphicon-refresh"
		}, 
        fields: {
        	password: {
        		validators: {
        			notEmpty: {
        				message: "Contraseña requerida"
        			},
        			stringLength: {
        				min: 8,
        				message: "Contraseña tiene que tener al menos 8 caracteres"
        			}
        		}
        	},
        	passwordR: {
        		validators: {
        			notEmpty: {
        				message: "Repetir contraseña requerido"
        			},
        			identical: {
        				field: "password",
        				message: "Repetir contraseña no coincide con contraseña"
        			}
        		}
        	}
        }
	});
	
	validator.on("success.form.bv", function (e) {
		//Prevenir el submit de form
		e.preventDefault();
		
		//Enviar el formulario
		var $form = $(e.target),
		fv    = $form.data('formValidation');
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize(),
		});
		
		$("#formCambiarPassword").addClass("hidden");
		$("#panel-comprobar").removeClass("panel-warning panel-danger").addClass("panel-success");
		$("#panel-comprobar-titulo").html("Cambio realizado con exito!");
		$("#password").val("");
		$("#formComprobar").removeClass("hidden");
	});
	
});

function resetModificacion() {
	$("#nombre").val(nombre);
	$("#descripcion").val(descripcion);
	$("#cargo").val(cargo);
}