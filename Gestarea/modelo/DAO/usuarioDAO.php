<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/modelo/BEAN/usuario.php";

class UsuarioDAO {
	
	public $connection;
	
	public function __construct($connection) {
		$this->connection = $connection;
	}
	
	public function getUsuario($dni) {
		$sql = "SELECT FECHA_ALTA, NOMBRE, PASSWORD, DESCRIPCION, CARGO, HORAS_ACUMULADAS, EMAIL 
				FROM USUARIO
				WHERE DNI = '" .$dni. "'";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$usuario = new Usuario($dni, $row["FECHA_ALTA"], $row["NOMBRE"], $row["PASSWORD"], $row["DESCRIPCION"], 
						$row["CARGO"], $row["HORAS_ACUMULADAS"], $row["EMAIL"]);
				
			}
			return $usuario;
		} else {
			return null;
		}
	}
	
	public function iniciarSesion($dni, $password) {
		$sql = "SELECT FECHA_ALTA, NOMBRE, PASSWORD, DESCRIPCION, CARGO, HORAS_ACUMULADAS, EMAIL 
				FROM USUARIO 
				WHERE 
					(DNI = '" .$dni. "' 
					AND 
					PASSWORD = '" .$password. "') 
					OR
					(EMAIL = '".$dni."' 
					AND
					PASSWORD = '".$password."')";
		
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$usuario = new Usuario($dni, $row["FECHA_ALTA"], $row["NOMBRE"], $password, $row["DESCRIPCION"], $row["CARGO"], $row["HORAS_ACUMULADAS"], $row["EMAIL"]);
			return $usuario;
		} else {
			return null;
		}
	}
	
	public function ingresar($usuario) {
		$sql = "INSERT INTO USUARIO(DNI, NOMBRE, PASSWORD, DESCRIPCION, CARGO, EMAIL) VALUES(
					'".$usuario->dni."' ,
					'".$usuario->nombre."' ,
					'".$usuario->password."' ,
					'".$usuario->descripcion."' ,
					".$usuario->cargo." ,
					'".$usuario->email."'
				)";
		
		$result = $this->connection->query($sql);
	}
	
	public function isEmailDuplicated($email) {
		$sql = "SELECT 1 
				FROM USUARIO 
				WHERE EMAIL = '".$email."'";
		
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function isDNIDuplicated($dni) {
		$sql = "SELECT 1
				FROM USUARIO
				WHERE DNI = '".$dni."'";
		
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	public function getUsuarios() {
		$list = array();
		$sql = "SELECT DNI, FECHA_ALTA, NOMBRE, PASSWORD, DESCRIPCION, CARGO, HORAS_ACUMULADAS, EMAIL FROM USUARIO";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			$i = 0;
			while($row = $result->fetch_assoc()) {
				$usuario = new Usuario($row["DNI"], $row["FECHA_ALTA"], $row["NOMBRE"], $row["PASSWORD"], $row["DESCRIPCION"], $row["CARGO"], $row["HORAS_ACUMULADAS"], $row["EMAIL"]);
				$list[$i] = $usuario;
				$i++;
			}
			return $list;
		} else {
			return null;
		}
	}
	
	public function modificarUsuario($dni, $fechaAlta, $nombre, $descripcion, $cargo, $email) {
		$sql = "UPDATE USUARIO SET DNI = '".$dni."',
								   FECHA_ALTA = '".$fechaAlta."', 
								   NOMBRE = '".$nombre."', 
								   DESCRIPCION = '".$descripcion."', 
								   CARGO = ".$cargo.", 
								   EMAIL = '".$email."'
				WHERE DNI = '".$dni."'";
		$this->connection->query($sql);
	}
	
	public function modificarPassword($dni, $password) {
		$sql = "UPDATE USUARIO SET PASSWORD = '".$password."' 
							WHERE DNI = '".$dni."'";
		$this->connection->query($sql);
	}
	
	public function buscarUsuarios($buscar) {
		$list = array();
		$sql = "SELECT DNI, FECHA_ALTA, NOMBRE, PASSWORD, DESCRIPCION, CARGO, HORAS_ACUMULADAS, EMAIL FROM USUARIO 
				WHERE NOMBRE LIKE '%".$buscar."%' OR DESCRIPCION LIKE '%".$buscar."%'";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			$i = 0;
			while($row = $result->fetch_assoc()) {
				$usuario = new Usuario($row["DNI"], $row["FECHA_ALTA"], $row["NOMBRE"], $row["PASSWORD"], $row["DESCRIPCION"], $row["CARGO"], $row["HORAS_ACUMULADAS"], $row["EMAIL"]);
				$list[$i] = $usuario;
				$i++;
			}
			return $list;
		} else {
			return null;
		}
	}
	
	
	
	
	
	
	
}

?>