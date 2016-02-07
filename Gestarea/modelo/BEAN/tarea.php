<?php

$root = realpath ( $_SERVER ["DOCUMENT_ROOT"] );
include_once $root . "/Gestarea/util/MyDates.php";

class tarea {
	
	public $id;
	public $fechaAlta;
	public $descripcion;
	public $fechaInicio;
	public $horaInicio;
	public $fechaFin;
	public $horaFin;
	public $horasTarea;
	public $totalHoras;
	
	public function __construct($id, $fechaAlta, $descripcion, $fechaInicio, $horaInicio, $fechaFin, $horaFin, $totalHoras) {
		$this->id = $id;
		$this->fechaAlta = $fechaAlta;
		$this->descripcion = $descripcion;
		$this->fechaInicio = $fechaInicio;
		$this->horaInicio = $horaInicio;
		$this->fechaFin = $fechaFin;
		$this->horaFin = $horaFin;
		$this->horasTarea = $this->getHorasTarea();
		$this->totalHoras = $totalHoras;
	}
	
	public function getDiasRestantes() {
		$myDates = new MyDates();
		
		//Fecha actual con este formato
		$fechaActual = date("Y-m-d");
		//La BBDD me devuelve un string, lo paso $date y luego lo formatea a "yyyy-mm-dd" para poder restarlo
// 		$fechaAlta = date_format(date_create($this->fechaF), "Y-m-d");
		$diasRestantes = $myDates->dateDifference($fechaActual, $this->fechaFin);
		return $diasRestantes;
	}
	
	public function getDiasTranscurridos() {
		$myDates = new MyDates();
		
		//Fecha actual con este formato
		$fechaActual = date("Y-m-d");
		
		$diasTranscurridos = $myDates->dateDifference($this->fechaInicio, $fechaActual);
		return $diasTranscurridos;
	}
	
	public function getDiasTarea() {
		$myDates = new MyDates();
		$diasTarea = $myDates->dateDifference(date($this->getTotalFechaFin()), date($this->getTotalFechaInicio()));
		return $diasTarea;
	}
	
	public function getTotalFechaInicio() {
		$totalFecha = $this->fechaInicio." ".$this->horaInicio;
		return $totalFecha;
	}
	
	public function getTotalFechaFin() {
		$totalFecha = $this->fechaFin." ".$this->horaFin;
		return $totalFecha;
	}
	
	public function getHorasTarea() {
		$myDates = new MyDates();
		$diasTarea = $myDates->dateDifference(date($this->getTotalFechaFin()), date($this->getTotalFechaInicio()));
		$horasTarea = $diasTarea * 8.5;
		return $horasTarea;
	}
	
}

?>