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
	include $root . "/Gestarea/includes/mysql-connection.php";
	?>
	<link rel="stylesheet" href="/Gestarea/my_css/checkbox_styled.css" />
</head>
<body>
	<?php 
	$usuario = new Usuario("", null, "", "", "", "", "", "");
	session_start();
	if (is_null($_SESSION["usuario"])) {
		header("Location: /Gestarea/index.php");
	} else {
		$usuario = $_SESSION["usuario"];
	}
	?>
	<div class="container-fluid">
		<!-- Sidebar -->
		<?php include $root . "/Gestarea/includes/elements/sidebar.php"; ?>
		
		<!-- Contenido -->
		<div class="container col-sm-8 contenidoOffset">
			<div class="row">
				<div class="text-center">
					<h2>Nueva Tarea</h2>
				</div>
			</div>
			<div class="row">
				<form action="/Gestarea/controlador/insertar-tarea.php" method="post" id="crearTareaForm" >
				
					<!-- FECHAS -->
					<div class="row">
						<!-- Fecha/Hora INICIO -->
						<div class="col-sm-6">
							<div class="text-center">
								<label>Fecha y hora de inicio</label>
							</div>
							<div class="col-xs-7">
								<div class="text-center">
									<div class="form-group">
										<label for="fechaStart" class="control-label">Fecha</label>
										<input type="text" id="fechaStart" name="fechaStart" class="form-control" placeholder="yyyy-mm-dd" />
									</div>
								</div>
							</div>
							<div class="col-xs-5">
								<div class="text-center">
									<div class="form-group">
										<label for="horaStart" class="control-label">Hora</label> 
										<input type="text" class="form-control" id="horaStart" name="horaStart" placeholder="hh:mm" />
									</div>
								</div>
							</div>
						</div>
						
						<!-- Fecha/Hora FIN -->
						<div class="col-sm-6">
							<div class="text-center">
								<label>Fecha y hora de finalizacion</label>
							</div>
							<div class="col-xs-7">
								<div class="text-center">
									<div class="form-group">
										<label for="fechaFin" class="control-label">Fecha</label>
										<input type="text" id="fechaFin" name="fechaFin" class="form-control" placeholder="yyyy-mm-dd" />
									</div>
								</div>
							</div>
							<div class="col-xs-5">
								<div class="text-center">
									<div class="form-group">
										<label for="horaFin" class="control-label">Hora</label>
										<input type="text" class="form-control" id="horaFin" name="horaFin" placeholder="hh:mm" />
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!-- DESCRIPCION -->
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4">
							<div class="form-group">
								<label for="descripcion" class="label-control">Descripcion</label>
								<textarea name="descripcion" id="descripcion" rows="5"
									class="form-control no-resize" maxlength="255"></textarea>
							</div>
						</div>
					</div>
					
					<!-- Lista Usuarios -->
					<div class="row text-center">
						<h2>Asignar usuarios a la tarea</h2>
					</div>
					<div class="col-md-8 col-md-offset-2 table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Añadir</th>
									<th>Nombre</th>
									<th class="text-center">Horas</th>
									<th class="text-center">Labor</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$sUsuario = new ServiceUsuario();
								$list = $sUsuario->getUsuarios();
								foreach ($list as $usuario) {
									?>
									<tr>
										<td class="vert-align text-center">
											<input type="text" name="usuarioDNI[]" class="hidden" value="<?php echo $usuario->dni ?>" disabled/>
											<input type="checkbox" name="usuarioCheckbox" />
											<span></span>
										</td>
										<td class="vert-align">
											<label><?php echo $usuario->nombre; ?></label>
										</td>
										<td>
											<div class="form-group vert-align">
												<input type=text class="form-control" name="usuarioHoras[]" maxLength="4" disabled/>
											</div>
										</td>
										<td>
											<div class="form-group vert-align">
												<input type="text" class="form-control" name="usuarioLabor[]" maxLength="15" disabled/>
											</div> 
										</td>
									</tr>
									<?php 
								}
								?>
							</tbody>
						</table>
					</div>
					
					<!-- SUBMIT -->
					<div class="col-sm-6 col-sm-offset-3">
						<button type="submit" class="btn btn-success btn-block">Crear tarea</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/Gestarea/my_lib/crearTarea.js"></script>
</body>
</html>