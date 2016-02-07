<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include_once $root.'/Gestarea/modelo/service/ServiceTarea.php';
include_once $root.'/Gestarea/modelo/service/ServiceTareaUsuario.php';

$fechaStart = $_POST["fechaStart"];
$horaStart = $_POST["horaStart"];
$fechaFin = $_POST["fechaFin"];
$horaFin = $_POST["horaFin"];
$descripcion = $_POST["descripcion"];

$tarea = new tarea(null, null, $descripcion, $fechaStart, $horaStart, $fechaFin, $horaFin, 0);

$usuDNI = $_POST["usuarioDNI"];
$usuHoras = $_POST["usuarioHoras"];
$usuLabor = $_POST["usuarioLabor"];
  
//Calcula el total de las horas de una tarea
$horasTotales = 0;
$diasTarea = $tarea->getDiasTarea();
foreach($usuHoras as $horas) {
	$horasTotales += $horas * $diasTarea;
}
$tarea->totalHoras = $horasTotales;

//Insert de tarea
$serTarea = new ServiceTarea();
$idTarea = $serTarea->insertarTarea($tarea);

//Insert de tarea usuario
$serTareaUsuario = new ServiceTareaUsuario();
for ($i = 0; $i < count($usuDNI); $i++) {
	$tareaUsuario = new TareaUsuario($idTarea, $usuDNI[$i], $usuHoras[$i], $usuLabor[$i]);
	$serTareaUsuario->insertarTareaUsuario($tareaUsuario);
}

?>