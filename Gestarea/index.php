<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Ingresar en Gestarea</title>
		<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include $root.'/Gestarea/includes/default-imports.php';
		?>
	</head>
<body>
	<?php 
	$dni = "";
	?>
	<div class="containter">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">Iniciar Sesion</div>
				<div class="panel-body">
					<form id="iniciarSesionForm" action="/Gestarea/controlador/ingresar-gestarea.php" method="post">
						<div class="row col-sm-10 col-sm-offset-1">
								<?php 
								if (isset($_GET["msgError"])) {
									$dni = $_GET["user"];
									echo "<div class='alert alert-danger fade in msgError'>
											 <a href='#' class='close' data-dismiss='alert'
												aria-label='close'>&times;</a> <strong>Ups!</strong>
											 Usuario y/o contraseña no son correctos
										  </div>";
								}
								?>
							<div class="form-group">
								<label for="dni" class="control-label">DNI/NIE o Email</label>
								<input type="text" class="form-control" id="dni" name="dni" maxLength="30" placeholder="00000000X o Email@correo.com" value="<?php echo $dni; ?>"/>
							</div>
							<div class="form-group">
								<label for="pw" class="control-label">Contraseña</label>
								<input type="password" class="form-control" id="pw" name="pw" placeholder="Contraseña"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="text-center">
								<button type="submit" class="btn btn-success">Entrar</button>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="text-center" style="margin-top: 1rem;">
								<a href="/Gestarea/vista/registrar.php">Crear cuenta nueva</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="/Gestarea/my_lib/iniciarSesionForm.js"></script>
</body>
</html>