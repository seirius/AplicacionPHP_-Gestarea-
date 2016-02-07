<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/util/ConnectionManager.php";

class ServiceTarea {
	
	public function insertarTarea($tarea) {
		$manager = new ConnectionManager();
		
		$tareaDAO = $manager->getTareaDAO();
		try {
			return $tareaDAO->insertar($tarea);
		} finally {
			$manager->close();
		}
	}
	
	public function getTarea($idTarea) {
		$manager = new ConnectionManager();
		
		$tareaDAO = $manager->getTareaDAO();
		try {
			$tarea = $tareaDAO->getTarea($idTarea);
			return $tarea;
		} finally {
			$manager->close();
		}
	}
	
	public function getUsuarioPorTarea($idTarea) {
		$manager = new ConnectionManager();
		
		$tareaDAO = $manager->getTareaDAO();
		try {
			$list = $tareaDAO->getUsuarioPorTarea($idTarea);
			return $list;
		} finally {
			$manager->close();
		}
	}
	
	public function buscarTarea($buscar) {
		$manager = new ConnectionManager();
		
		$tareaDAO = $manager->getTareaDAO();
		try {
			$list = $tareaDAO->buscarTareas($buscar);
			return $list;
		} finally {
			$manager->close();
		}
	}
}

?>