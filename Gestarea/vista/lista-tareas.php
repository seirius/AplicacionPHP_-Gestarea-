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
					<h2>Tus tareas</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<button class="btn btn-default btn-block clickable" data-href="/Gestarea/vista/crear-tarea.php">Nueva Tarea</button>
				</div>
				<div class="col-sm-6 col-sm-offset-2">
					<form class="form-horizontal">
						<div class="form-group">
							<label for="ordenar" class="control-label col-xs-4">Ordenar Por</label> 
							<div class="col-xs-8">
								<select name="ordenar" id="ordenar" class="form-control">
									<option value="id">ID</option>
									<option value="FECHA_ALTA">Fecha de Alta</option>
									<option value="FECHA_INICIO">Fecha de Inicio</option>
									<option value="FECHA_FIN">Fecha de Finalizacion</option>
									<option value="HORAS_TAREA">Horas asignadas</option>
									<option value="TOTAL_HORAS">Total horas</option>
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12" id="listaTareas">
			<?php 
			$sUsuario = new ServiceUsuario();
			$listTareas = $sUsuario->getTareasUsuarios($usuario->dni, "ID", "ASC");
			if (!is_null($listTareas)) {
				for ($i = 0; $i < count($listTareas); $i++) {
					$tarea = $listTareas[$i];
					
					//Dias restantes
					$diasRestantes = $tarea->getDiasRestantes();
					
					//Descripcion
					$descripcion = $tarea->descripcion;
					
					//Dias transcurridos
					$diasTranscurridos = $tarea->getDiasTranscurridos();
					
					$fechaFinalizacion = $tarea->fechaFin;
					
					?>
					<div class="panel panel-primary">
						<div class="panel-heading"><?php echo $tarea->id; ?></div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
									<div class="well text-center">
										Dias restantes <br>
											<?php echo $diasRestantes; ?> dias
										</div>
									<div class="well text-center">
										Dias transcurridos <br>
											<?php echo $diasTranscurridos; ?> dias
										</div>
								</div>
								<div class="col-md-6">
									<div class="well">
										<p>Descripcion:</p>
										<p><?php echo $descripcion; ?></p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="well text-center">
										Fecha Inicio <br>
										<?php echo $tarea->fechaInicio; ?>
									</div>
									<div class="well text-center">
										Fecha finalizacion <br>
										<?php echo $fechaFinalizacion; ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<button class="btn btn-primary btn-block clickable" data-href="/Gestarea/vista/ver-tarea.php?idTarea=<?php echo $tarea->id; ?>">Mas informacion</button>
								</div>
							</div>
						</div>	
					</div>
					<?php 
				}
			} else {
				echo "<h3>Parece que no tienes tareas, bien! (¿no?)</h3>";
			}
			?>
				</div>
			</div>
		</div>
	</div>
	<script src="/Gestarea/my_lib/lista-tareas.js"></script>
	<input type="text" name="hiddenID" id="hiddenID" class="hidden" value="<?php echo $usuario->dni; ?>"/>
</body>
</html>