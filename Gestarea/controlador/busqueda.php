<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/modelo/service/ServiceUsuario.php";
include_once $root."/Gestarea/modelo/service/ServiceTarea.php";

$buscar = $_POST["buscar"];

$serTarea = new ServiceTarea();
$serUsuario = new ServiceUsuario();

$listTareas = $serTarea->buscarTarea($buscar);
$listUsuarios = $serUsuario->buscarUsuarios($buscar);

?>

<div id="acordeon-ui" class="col-xs-12 margin-top-3">
	<h3>Tareas<span class="badge"><?php echo count($listTareas); ?></span></h3>
	<div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Descripcion</th>
					<th>Fecha de finalizacion</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (!is_null($listTareas)) {
					foreach ($listTareas as $tarea) {
						?>
						<tr class="clickable" data-href="/Gestarea/vista/ver-tarea.php?idTarea=<?php echo $tarea->id?>">
							<td><?php echo $tarea->id; ?></td>
							<td><?php echo $tarea->descripcion; ?></td>
							<td><?php echo $tarea->getTotalFechaFin(); ?></td>
						</tr>
						<?php 
					}
				} else {
					?>
					<tr>
						<td>No se encontraron resultados</td>
						<td></td>
						<td></td>
					</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
	</div>
	<h3>Usuarios<span class="badge"><?php echo count($listUsuarios); ?></span></h3>
	<div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Cargo</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if (!is_null($listUsuarios)) {
					foreach ($listUsuarios as $usuario) {
						?>
						<tr>
							<td><?php echo $usuario->nombre; ?></td>
							<td><?php echo $usuario->descripcion; ?></td>
							<td><?php echo $usuario->getCargo(); ?></td>
						</tr>
						<?php 
					}
				} else {
					?>
					<tr>
						<td>No se encontraron resultados</td>
						<td></td>
						<td></td>
					</tr>
					<?php 
				}
				?>
			</tbody>
		</table>
	</div>
</div>


