<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/modelo/BEAN/tarea.php";
include_once $root."/Gestarea/modelo/BEAN/usuario.php";

class TareaDAO {
	
	public $connection;
	
	public function __construct($connection) {
		$this->connection = $connection;
	}
	
	//Recupera tarea que tiene un usuario
	//$orderBy -> devolver la lista en el orden por columna que se indique
	//$orderDir -> descendiente o ascendente
	public function getTareasUsuario($dni, $orderBy, $orderDir) {
		$list = array();
		$sql = "SELECT ID, FECHA_ALTA, DESCRIPCION, FECHA_INICIO, HORA_INICIO, FECHA_FIN, HORA_FIN, HORAS_TAREA, TOTAL_HORAS FROM tarea
				WHERE ID IN (SELECT ID_TAREA FROM TAREA_USUARIO WHERE DNI_USUARIO = '".$dni."')
				ORDER BY ".$orderBy." ".$orderDir.";";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			$i = 0;
			while($row = $result->fetch_assoc()) {
				$tarea = new tarea($row["ID"], $row["FECHA_ALTA"], $row["DESCRIPCION"], $row["FECHA_INICIO"], $row["HORA_INICIO"], 
						$row["FECHA_FIN"], $row["HORA_FIN"], $row["HORAS_TAREA"], $row["TOTAL_HORAS"]);
				
				$list[$i] = $tarea;
				$i++;
			}
			return $list;
		} else {
			return null;
		}
	}
	
	public function getUsuarioPorTarea($idTarea) {
		$list = array();
		$sql = "SELECT DNI, FECHA_ALTA, NOMBRE, PASSWORD, DESCRIPCION, CARGO, HORAS_ACUMULADAS, EMAIL
				FROM USUARIO
				WHERE DNI IN (SELECT DNI_USUARIO
			  				  FROM TAREA_USUARIO
              				  WHERE ID_TAREA = ".$idTarea.")";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			$i = 0;
			while($row = $result->fetch_assoc()) {
				$usuario = new Usuario($row["DNI"], $row["FECHA_ALTA"], $row["NOMBRE"], $row["PASSWORD"], $row["DESCRIPCION"], 
						$row["CARGO"], $row["HORAS_ACUMULADAS"], $row["EMAIL"]);
		
				$list[$i] = $usuario;
				$i++;
			}
			return $list;
		} else {
			return null;
		}
	}
	
	public function getTarea($idTarea) {
		$sql = "SELECT ID, FECHA_ALTA, DESCRIPCION, FECHA_INICIO, HORA_INICIO, FECHA_FIN, HORA_FIN, HORAS_TAREA, TOTAL_HORAS FROM TAREA 
				WHERE ID = '".$idTarea."'";
		$result = $this->connection->query($sql);
		if ($row = $result->fetch_assoc()) {
			$tarea = new tarea($row["ID"], $row["FECHA_ALTA"], $row["DESCRIPCION"], $row["FECHA_INICIO"], $row["HORA_INICIO"], 
						$row["FECHA_FIN"], $row["HORA_FIN"], $row["HORAS_TAREA"], $row["TOTAL_HORAS"]);
			return $tarea;
		} else {
			return 0;
		}
	}
	
	public function insertar($tarea) {
		$sql = "INSERT INTO TAREA(DESCRIPCION, FECHA_INICIO, HORA_INICIO, FECHA_FIN, HORA_FIN, HORAS_TAREA, TOTAL_HORAS) 
		   VALUES('".$tarea->descripcion."', '".$tarea->fechaInicio."', '".$tarea->horaInicio."', 
		   		'".$tarea->fechaFin."', '".$tarea->horaFin."', ".$tarea->horasTarea.", ".$tarea->totalHoras.")";
		$this->connection->query($sql);
		return $this->connection->insert_id;
	}
	
	public function buscarTareas($buscar) {
		$list = array();
		$sql = "SELECT ID, FECHA_ALTA, DESCRIPCION, FECHA_INICIO, HORA_INICIO, FECHA_FIN, HORA_FIN, HORAS_TAREA, TOTAL_HORAS FROM TAREA
				WHERE DESCRIPCION LIKE '%".$buscar."%'";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			$i = 0;
			while($row = $result->fetch_assoc()) {
				$tarea = new tarea($row["ID"], $row["FECHA_ALTA"], $row["DESCRIPCION"], $row["FECHA_INICIO"], $row["HORA_INICIO"], 
						$row["FECHA_FIN"], $row["HORA_FIN"], $row["HORAS_TAREA"], $row["TOTAL_HORAS"]);
				
				$list[$i] = $tarea;
				$i++;
			}
			return $list;
		} else {
			return null;
		}
	}
	
}

?>

