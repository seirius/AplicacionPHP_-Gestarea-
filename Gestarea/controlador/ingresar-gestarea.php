<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root."/Gestarea/modelo/service/ServiceUsuario.php";

$dni = $_POST["dni"];
$pw = $_POST["pw"];

$sUsuario = new ServiceUsuario();
$usuario = $sUsuario->iniciarSesion($dni, $pw);
if (!is_null($usuario)) {
	session_start();
	$_SESSION["usuario"] = $usuario;
	header("Location: /Gestarea/vista/lista-tareas.php");
} else {
	header("Location: /Gestarea/index.php?msgError=true&user=".urlencode($dni));
}
?>