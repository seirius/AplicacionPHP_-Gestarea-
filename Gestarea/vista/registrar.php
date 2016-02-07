<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registrar cuenta nueva en Gestarea</title>
		<?php
		$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		include $root.'/Gestarea/includes/default-imports.php';
		?>
	</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="text-center">
					<h1>Creacion de cuenta</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-8">
			<div class="panel panel-success hidden" id="exito">
				<div class="panel-heading">Usuario creado con exito</div>
				<div class="panel-body">
					<a href="/Gestarea/index.php">Iniciar sesion</a>
				</div>
			</div>
			<div class="panel panel-default" id="formulario">
				<div class="panel-heading">Datos necesarios</div>
				<div class="panel-body">
					<form action="/Gestarea/controlador/ingresar-usuario.php" method="post" class="form-horizontal" id="registrarForm">
						<div class="form-group">
							<label for="nombre" class="control-label col-sm-4">Nombre*</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="nombre" name="nombre" maxLength="50"/>
							</div>
						</div>
						<div class="form-group">
							<label for="dni" class="control-label col-sm-4">DNI/NIE*</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="dni" name="dni" maxLength="9"/>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="control-label col-sm-4">Email*</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="email" name="email" maxLength="30"/>
							</div>
						</div>
						<div class="form-group">
							<label for="cargo" class="control-label col-sm-4">Cargo*</label>
							<div class="col-sm-8">
								<select name="cargo" id="cargo" class="form-control">
									<option value="">Elige uno</option>
									<option value="1">Laboral</option>
									<option value="2">Tecnico</option>
									<option value="3">Director</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="control-label col-sm-4">Contraseña*</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="password" name="password" maxLength="30"/>
							</div>
						</div>
						<div class="form-group">
							<label for="passwordR" class="control-label col-sm-4">Repetir contraseña*</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="passwordR" name="passwordR" maxLength="30"/>
							</div>
						</div>
						<div class="form-group">
							<label for="descripcion" class="control-label col-sm-4">Descripcion</label>
							<div class="col-sm-8">
								<textarea name="descripcion" id="descrpcion" rows="6" class="form-control no-resize" maxLength="200"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="captcha" class="control-label col-sm-4" id="labelCaptcha"></label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="captcha" name="captcha" />
							</div>
						</div>
						<div class="col-sm-4 col-sm-offset-4">
							<button type="submit" class="btn btn-success btn-block">Crear cuenta</button>
						</div>
						<div class="col-sm-4">
							<button type="button" class="btn btn-danger btn-block clickable" data-href="/Gestarea/index.php">Volver atras</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="/Gestarea/my_lib/registrarForm.js"></script>
</body>
</html>