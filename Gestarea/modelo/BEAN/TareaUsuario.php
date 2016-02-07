<?php

class TareaUsuario {
	
	public $idTarea;
	public $dniUsuario;
	public $horas;
	public $labor;
	
	public function __construct($idTarea, $dniUsuario, $horas, $labor) {
		$this->idTarea = $idTarea;
		$this->dniUsuario = $dniUsuario;
		$this->horas = $horas;
		$this->labor = $labor;
	}
}
?>