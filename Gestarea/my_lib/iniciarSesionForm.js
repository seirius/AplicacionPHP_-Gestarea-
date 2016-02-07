$(document).ready(function () {
	var validator = $("#iniciarSesionForm").bootstrapValidator({
		feedbackIcons: {
			valid: "glyphicon glyphicon-ok",
			invalid: "glyphicon glyphicon-remove", 
			validating: "glyphicon glyphicon-refresh"
		}, 
        fields: {
        	dni: {
        		validators: {
        			notEmpty: {
        				message: "DNI/NIE requerido"
        			}
        		}
        	},
        	pw: {
        		validators: {
        			notEmpty: {
        				message: "Contraseña requerida"
        			}
        		}
        	}
        }
	});
});