<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root."/Gestarea/modelo/service/ServiceUsuario.php";

$sUsuario = new ServiceUsuario();

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$password = $_POST["password"];
$descripcion = $_POST["descripcion"];
$cargo = $_POST["cargo"];
$email = $_POST["email"];

$usuario = new Usuario($dni, null, $nombre, $password, $descripcion, $cargo, null, $email);
$sUsuario->ingresarUsuario($usuario);

?>