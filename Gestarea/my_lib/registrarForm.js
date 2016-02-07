var resultadoCaptcha = -1;

$(document).ready(function () {
	cargarCaptcha();
	
	var validator = $("#registrarForm").bootstrapValidator({
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
        	dni: {
        		validators: {
        			notEmpty: {
        				message: "DNI/NIE requerido"
        			},
        			stringLength: {
        				min: 9,
        				message: "DNI/NIE tiene que tener 9 caracteres"
        			},
        			callback: {
                        message: 'El formato de DNI debe ser 00000000X',
                        callback: function (value, validator, $field) {
                           return checkDNI(value);
                        }
                    },
        			remote: {
        				url: '/Gestarea/controlador/comprobar-duplicado.php',
        				data: {
        					type: "text"
        				},
        				type: 'POST',
        				delay: 2000,     // Send Ajax request every 2 seconds
        				message: "La persona con este DNI/NIE ya esta registrada"
        			}
        		}
        	},
        	email: {
        		validators: {
        			notEmpty: {
        				message: "Email requerido"
        			},
        			stringLength: {
        				min: 8,
        				message: "Email tiene que tener al menos 8 caracteres"
        			},
        			remote: {
                        url: '/Gestarea/controlador/comprobar-duplicado.php',
                        data: {
                        	type: "email"
                        },
                        type: 'POST',
                        delay: 2000,    // Send Ajax request every 2 seconds
                        message: "Email ya existe"
                    }
        		}
        	},
        	cargo: {
        		validators: {
        			notEmpty: {
        				message: "Se tiene que seleccionar un cargo"
        			}
        		}
        	},
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
        	},
        	captcha: {
        		validators: {
        			notEmpty: {
        				message: "Necesaria respuesta a la pregunta"
        			},
        			callback: {
        				message: "Respuesta incorrecta",
        				callback: function (value, validator, $field) {
        					return checkCaptcha(value);
        				}
        			}
        		}
        	}
        }
	});
	
	validator.on("success.form.bv", function (e) {
		//Prevenir el submit de form
		e.preventDefault();
		//Mostrar mensaje de exito
		$("#formulario").addClass("hidden");
		$("#exito").removeClass("hidden");
		
		//Enviar el formulario
		var $form = $(e.target),
		fv    = $form.data('formValidation');
		$.ajax({
			url: $form.attr('action'),
			type: 'POST',
			data: $form.serialize()
		});
	});
});

function checkDNI(value) {
    var numero;
    var let;
    var letra;
    var expresion_regular_dni;
    var dni = value;

    expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
    let = dni.substring(8);
    numero = parseInt(dni.substring(0, 8));
    if (expresion_regular_dni.test(dni)) {
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero + 1);
        if (letra !== let.toUpperCase()) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}

function cargarCaptcha() {
	var labelCaptcha = $("#labelCaptcha");
	var num1 = getRandomInt(0, 9);
	var num2 = getRandomInt(0, 9);
	resultadoCaptcha = num1 + num2;
	
	var num1S = digitoAPalabra(num1);
	var num2S = digitoAPalabra(num2);
	labelCaptcha.html("¿Cuanto es "+ num1S +" mas "+ num2S +"?");
}

function checkCaptcha(respuesta) {
	if (respuesta == resultadoCaptcha) return true;
	else return false;
}

function digitoAPalabra(digito) {
	switch(digito) {
	case 1: return "uno";
	case 2: return "dos";
	case 3: return "tres";
	case 4: return "cuatro";
	case 5: return "cinco";
	case 6: return "seis";
	case 7: return "siete";
	case 8: return "ocho";
	case 9: return "nueve";
	default: return "cero";
	}
}

//Devuelve un numero entre min (inclusive) y max (inclusive)
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}








