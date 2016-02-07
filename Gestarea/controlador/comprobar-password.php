<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root."/Gestarea/modelo/service/ServiceUsuario.php";

$dni = $_GET["dni"];
$pw = $_POST["password"];

$sUsuario = new ServiceUsuario();
$usuario = $sUsuario->iniciarSesion($dni, $pw);
if (!is_null($usuario)) {
	echo 1;
} else {
	echo 0;
}

?>