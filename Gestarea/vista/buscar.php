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
			<div class="row">
				<div class="col-md-4 col-md-offset-4 margin-top-3">
					<form id="buscarForm">
						<div class="input-group input-group-lg">
							<span class="input-group-addon" id="addon1">
								<span class="glyphicon glyphicon-search"></span>
							</span>
		  					<input type="text" class="form-control input-lg" name="buscar" id="buscar" aria-describedby="addon1">
		  					<span class="input-group-btn">
							    <button type="submit" class="btn btn-primary" type="button">Buscar</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2" id="resultadoBusqueda"></div>
			</div>
		</div>
	</div>
	<script src="/Gestarea/my_lib/buscar.js"></script>
</body>
</html>