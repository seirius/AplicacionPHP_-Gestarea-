<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lista de tareas</title>
	<?php
	$root = realpath ( $_SERVER ["DOCUMENT_ROOT"] );
	include $root . '/Gestarea/includes/default-imports.php';
	include $root . '/Gestarea/includes/sidebar-imports.php';
	include $root . "/Gestarea/modelo/service/ServiceUsuario.php";
	?>
</head>
<body>
	<?php
	$usuario = new Usuario ( "", null, "", "", "", "", "", "" );
	session_start ();
	if (is_null ( $_SESSION ["usuario"] )) {
		header ( "Location: /Gestarea/index.php" );
	} else {
		$usuario = $_SESSION ["usuario"];
	}
	?>
	<script>
		var nombre = "<?php echo $usuario->nombre; ?>";
		var descripcion = "<?php echo $usuario->descripcion; ?>";
		var cargo = "<?php echo $usuario->cargo; ?>";
	</script>
	<div class="container-fluid">
		<!-- Sidebar -->
		<?php include $root . "/Gestarea/includes/elements/sidebar.php"; ?>
		
		<!-- Contenido -->
		<div class="container col-sm-8 contenidoOffset">
			<div class="col-lg-6 margin-top-3">
				<form action="/Gestarea/controlador/modificar-perfil.php" class="form-horizontal" id="modificarPerfilForm" method="post">
					<div class="panel panel-info" id="panel-modificar">
					
						<div class="panel-heading" id="panel-modificar-titulo">Informacion de cuenta</div>
						
						<div class="panel-body">
							<div class="form-group">
								<label for="dni" class="control-label col-sm-4">DNI/NIE</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="dni" name="dni"	readonly value="<?php echo $usuario->dni; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label col-sm-4">Nombre</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="nombre"	name="nombre" value="<?php echo $usuario->nombre; ?>" maxLength="50" />
								</div>
							</div>
							<div class="form-group">
								<label for="fechaAlta" class="control-label col-sm-4">Fecha de alta</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="fechaAlta" name="fechaAlta" readonly value="<?php echo $usuario->fechaAlta; ?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="descripcion" class="control-label col-sm-4">Descripcion</label>
								<div class="col-sm-8">
									<textarea class="form-control no-resize" rows="5" id="descripcion" name="descripcion" maxLength="200"><?php echo $usuario->descripcion; ?></textarea>
								</div>
							</div>
							
							<?php 
							
							$laboral = "";
							$tecnico = "";
							$director = "";
							if ($usuario->cargo == 1) {
								$laboral = "selected";
							} else if ($usuario->cargo == 2) {
								$tecnico = "selected";
							} else if ($usuario->cargo == 3) {
								$director = "selected";
							}
							
							?>
							
							<div class="form-group">
								<label for="cargo" class="control-label col-sm-4">Cargo</label>
								<div class="col-sm-8">
									<select name="cargo" id="cargo" class="form-control">
										<option value="">Elige uno</option>
										<option value="1" <?php echo $laboral; ?>>Laboral</option>
										<option value="2" <?php echo $tecnico; ?>>Tecnico</option>
										<option value="3" <?php echo $director; ?>>Director</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="control-label col-sm-4">Email</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="email" name="email" maxLength="30" value="<?php echo $usuario->email; ?>" readonly/>
								</div>
							</div>
						</div>
						
						<div class="panel-footer overflow">
							<div class="col-sm-offset-2 col-sm-4">
								<button type="submit" class="btn btn-success btn-block">Guardar</button>
							</div>
							<div class="col-sm-4">
								<button type="button" class="btn btn-danger btn-block" id="boton-cancelar">Cancelar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-6 col-md-5 margin-top-3">
				<form action="/Gestarea/controlador/comprobar-password.php?dni=<?php echo $usuario->dni; ?>" class="form-horizontal" id="formComprobar" method="post">
					<div class="panel panel-warning" id="panel-comprobar">
						<div class="panel-heading" id="panel-comprobar-titulo">Cambiar contraseña</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="password" class="control-label col-md-6">Contraseña actual</label>
								<div class="col-md-6">
									<input type="password" name="password" id="password" class="form-control" />
								</div>
							</div>
						</div>
						<div class="panel-footer overflow">
							<div class="text-right">
								<button type="submit" class="btn btn-success">Comprobar</button>
							</div>
						</div>
					</div>
				</form>
				
				<form action="/Gestarea/controlador/cambiar-password.php?dni=<?php echo $usuario->dni; ?>" class="form-horizontal hidden" id="formCambiarPassword" method="post">
					<div class="panel panel-success">
						<div class="panel-heading">Inserta nueva contraseña</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="passwordCambiar" class="control-label col-md-6">Nueva contraseña</label>
								<div class="col-md-6">
									<input type="password" name="password" id="passwordCambiar" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label for="passwordR" class="control-label col-md-6">Repetir contraseña</label>
								<div class="col-md-6">
									<input type="password" name="passwordR" id="passwordR" class="form-control" />
								</div>
							</div>
						</div>
						<div class="panel-footer overflow">
							<div class="text-right">
								<button type="submit" class="btn btn-success">Cambiar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/Gestarea/my_lib/perfil.js"></script>
</body>
</html>