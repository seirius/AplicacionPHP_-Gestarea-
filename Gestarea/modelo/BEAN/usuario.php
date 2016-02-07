<?php

class Usuario {
	
	public $dni;
	public $fechaAlta;
	public $nombre;
	public $password;
	public $descripcion;
	public $cargo;
	public $horasAcumuladas;
	public $email;
	
	public function __construct($dni, $fechaAlta, $nombre, $password, $descripcion, $cargo, $horasAcumuladas, $email) {
		$this->dni = $dni;
		$this->fechaAlta = $fechaAlta;
		$this->nombre = $nombre;
		$this->password = $password;
		$this->descripcion = $descripcion;
		$this->cargo = $cargo;
		$this->horasAcumuladas = $horasAcumuladas;
		$this->email = $email;
	}
	
	public function setDNI($dni) {
		$this->dni = $dni;
	}
	
	public function setPassword($password) {
		$this->password = $password;
	}
	
	public function getCargo() {
		switch($this->cargo) {
			case 1:
				return "Laboral";
			case 2:
				return "Tecnico";
			case 3: 
				return "Director";
		}
	}
	
	
}

?>