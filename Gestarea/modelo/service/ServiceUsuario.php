<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/util/ConnectionManager.php";

class ServiceUsuario {
	
	public function getUsuario($dni) {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		try {
			return $usuarioDAO->getUsuario($dni);
		} finally {
			$manager->close();
		}
	}
	
	public function iniciarSesion($login, $password) {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		try {
			return $usuarioDAO->iniciarSesion($login, $password);
		} finally {
			$manager->close();
		}
	}
	
	public function modificarPassword($dni, $password) {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		try {
			$usuarioDAO->modificarPassword($dni, $password);
		} finally {
			$manager->close();
		}
	}
	
	public function getUsuarios() {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		try {
			return $usuarioDAO->getUsuarios();
		} finally {
			$manager->close();
		}
	}
	
	public function getTareasUsuarios($dni, $orderBy, $orderDir) {
		$manager = new ConnectionManager();
		
		$tareaDAO = $manager->getTareaDAO();
		try {
			return $tareaDAO->getTareasUsuario($dni, $orderBy, $orderDir);
		} finally {
			$manager->close();
		}
	}
	
	public function isEmailDuplicated($email) {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		try {
			return $usuarioDAO->isEmailDuplicated($email);
		} finally {
			$manager->close();
		}
	}
	
	public function isDNIDuplicated($dni) {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		try {
			return $usuarioDAO->isDNIDuplicated($dni);
		} finally {
			$manager->close();
		}
	}
	
	public function ingresarUsuario($usuario) {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		$usuarioDAO->ingresar($usuario);
		
		$manager->close();
	}
	
	public function modificarUsuario($usuario) {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		$usuarioDAO->modificarUsuario($usuario->dni, $usuario->fechaAlta, $usuario->nombre, $usuario->descripcion, $usuario->cargo, $usuario->email);
		
		$manager->close();
	}
	
	public function buscarUsuarios($buscar) {
		$manager = new ConnectionManager();
		
		$usuarioDAO = $manager->getUsuarioDAO();
		try {
			return $usuarioDAO->buscarUsuarios($buscar);
		} finally {
			$manager->close();
		}
	}
	
	
}
?>