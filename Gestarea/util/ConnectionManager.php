<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/util/MySQLConnection.php";
include_once $root."/Gestarea/modelo/DAO/usuarioDAO.php";
include_once $root."/Gestarea/modelo/DAO/tareaDAO.php";
include_once $root."/Gestarea/modelo/DAO/TareaUsuarioDAO.php";

class ConnectionManager {
	
	private $msql;
	
	public function __construct() {
		$this->msql = new MySQLConnection();
	}
	
	public function getUsuarioDAO() {
		$usuarioDAO = new UsuarioDAO($this->msql->getConnection());
		return $usuarioDAO;
	}
	
	public function getTareaDAO() {
		$tareaDAO = new TareaDAO($this->msql->getConnection());
		return $tareaDAO;
	}
	
	public function getTareaUsuarioDAO() {
		$tareaUsuarioDAO = new TareaUsuarioDAO($this->msql->getConnection());
		return $tareaUsuarioDAO;
	}
	
	public function close() {
		$this->msql->close();
	}
}

?>
