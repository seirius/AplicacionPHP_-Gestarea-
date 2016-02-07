<?php

$root = realpath ( $_SERVER ["DOCUMENT_ROOT"] );
include_once $root . "/Gestarea/util/MySQLConnection.php";
include_once $root . "/Gestarea/modelo/service/ServiceTarea.php";

$msql = new MySQLConnection();
$connection = $msql->getConnection();
$sql = "SELECT ID, FECHA_ALTA, DESCRIPCION, FECHA_INICIO, HORA_INICIO, FECHA_FIN, HORA_FIN, HORAS_TAREA, TOTAL_HORAS FROM TAREA 
				WHERE ID = '1'";
$connection->query($sql);
if ($row = $result->num_rows > 0) {
	echo $row["ID"];
	$tarea = new tarea ( $row ["ID"], $row ["FECHA_ALTA"], $row ["DESCRIPCION"], $row ["FECHA_INICIO"], $row ["HORA_INICIO"], $row ["FECHA_FIN"], $row ["HORA_FIN"], $row ["HORAS_TAREA"], $row ["TOTAL_HORAS"] );
}
		
$msql->close();
?>