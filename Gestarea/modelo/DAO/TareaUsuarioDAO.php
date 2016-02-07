<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/modelo/BEAN/TareaUsuario.php";

class TareaUsuarioDAO {
	
	public $connection;
	
	public function __construct($connection) {
		$this->connection = $connection;
	}
	
	public function insertar($tareaUsuario) {
		$sql = "INSERT INTO TAREA_USUARIO(ID_TAREA, DNI_USUARIO, HORAS, LABOR)
					VALUES(".$tareaUsuario->idTarea.", '".$tareaUsuario->dniUsuario."', 
							".$tareaUsuario->horas.", '".$tareaUsuario->labor."')";
		$this->connection->query($sql);
	}
	
}

?>