<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/util/ConnectionManager.php";

class ServiceTareaUsuario {
	
	public function insertarTareaUsuario($tareaUsuario) {
		$manager = new ConnectionManager();
		
		$tareaUsuarioDAO = $manager->getTareaUsuarioDAO();
		try {
			return $tareaUsuarioDAO->insertar($tareaUsuario);
		} finally {
			$manager->close();
		}
	}
}

?>