<?php

$root = realpath ( $_SERVER ["DOCUMENT_ROOT"] );

include $root."/Gestarea/modelo/service/ServiceUsuario.php";

$dni = $_GET["dni"];

$ordenar = $_GET["ordenar"];

$sUsuario = new ServiceUsuario();
$listTareas = $sUsuario->getTareasUsuarios($dni, $ordenar, "ASC");
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
				<button class="btn btn-primary btn-block">Mas informacion</button>
			</div>
		</div>
	</div>
</div>
<?php 
}
?>