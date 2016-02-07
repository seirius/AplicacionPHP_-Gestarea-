<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include_once $root."/Gestarea/modelo/service/ServiceUsuario.php";

$estaDisponible = false;

$sUsuario = new ServiceUsuario();

if (isset($_POST["email"])) {
	$email = $_POST["email"];
	if ($sUsuario->isEmailDuplicated($email)) {
		$estaDisponible = false;
	} else {
		$estaDisponible = true;
	}
} else if (isset($_POST["dni"])) {
	$dni = $_POST["dni"];
	if ($sUsuario->isDNIDuplicated($dni)) {
		$estaDisponible = false;
	} else {
		$estaDisponible = true;
	}
}

echo json_encode(array(
		'valid' => $estaDisponible,
));
?>