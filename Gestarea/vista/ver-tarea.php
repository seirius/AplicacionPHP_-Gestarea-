<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ver tarea</title>
	<?php
	$root = realpath ( $_SERVER ["DOCUMENT_ROOT"] );
	include $root . '/Gestarea/includes/default-imports.php';
	include $root . '/Gestarea/includes/sidebar-imports.php';
	include $root . "/Gestarea/modelo/service/ServiceTarea.php";
	?>
	<link rel="stylesheet" href="/Gestarea/my_css/ver-tarea.css" />
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
	
	$idTarea = null;
	if (isset($_GET["idTarea"])) {
		$idTarea = $_GET["idTarea"];
	}
	?>
	<div class="container-fluid">
		<!-- Sidebar -->
		<?php include $root . "/Gestarea/includes/elements/sidebar.php"; ?>
		
		<!-- Contenido -->
		<div class="container col-sm-8 contenidoOffset">
			<?php 
			$serTarea = new ServiceTarea();
			$tarea = $serTarea->getTarea($idTarea);
			$listUsuarios = $serTarea->getUsuarioPorTarea($idTarea);
			//Si se entra con una id que no existe en la BBDD
			if (is_null($idTarea) || is_null($tarea)) {
				
				?>
				<div class="row">
					<div class="text-center">
						<h2 style="color: red">No hay ninguna tarea con esta id</h2>
					</div>
				</div>
				<?php 
				
			} else {
				//Codigo del resto de la web
				?>
				
				
				<div class="row col-sm-10 col-sm-offset-1 margin-top-3">
					<div class="panel panel-primary">
						<div class="panel-heading"><h2>ID <?php echo $tarea->id; ?></h2></div>
						<div class="panel-body">
							<div class="row col-sm-8 col-sm-offset-2">
								<div class="panel panel-default">
									<div class="panel-heading"><h4>Descripcion</h4></div>
									<div class="panel-body">
										<p><?php echo $tarea->descripcion; ?></p>
									</div>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="panel panel-default">
									<div class="panel-heading"><h4>Participantes</h4></div>
									<div class="panel-body">
										<table class="table">
											<thead>
												<tr>
													<th>Nombre</th>
													<th>Cargo</th>
												</tr>
											</thead>
											<tbody>
												<?php
												foreach ( $listUsuarios as $usuario ) {
												?>
												<tr>
													<td><?php echo $usuario->nombre; ?></td>
													<td><?php echo $usuario->getCargo(); ?></td>
												</tr>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							<div class="col-sm-6">
								<div class="panel panel-default">
									<div class="panel-heading"><h4>Datos de tarea</h4></div>
									<div class="panel-body">
										<table class="table">
											<tbody>
												<tr>
													<th>Fecha Alta</th>
													<th><?php echo $tarea->fechaAlta; ?></th>
												</tr>
												<tr>
													<th>Fecha Inicio</th>
													<th><?php echo $tarea->getTotalFechaInicio(); ?></th>
												</tr>
												<tr>
													<th>Fecha Finalizacion</th>
													<th><?php echo $tarea->getTotalFechaFin(); ?></th>
												</tr>
												<tr>
													<th>Dias restantes</th>
													<th><?php echo $tarea->getDiasRestantes(); ?></th>
												</tr>
												<tr>
													<th>Dias transcurridos</th>
													<th><?php echo $tarea->getDiasTranscurridos(); ?></th>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
			}
			?>
		</div>
	</div>
</body>
</html>