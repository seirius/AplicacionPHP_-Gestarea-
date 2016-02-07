<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root."/Gestarea/modelo/service/ServiceUsuario.php";

$sUsuario = new ServiceUsuario();

$dni = $_POST["dni"];
$fechaAlta = $_POST["fechaAlta"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$cargo = $_POST["cargo"];
$email = $_POST["email"];

$usuario = new Usuario($dni, $fechaAlta, $nombre, null, $descripcion, $cargo, null, $email);
$sUsuario->modificarUsuario($usuario);

session_start();
$_SESSION["usuario"] = $sUsuario->getUsuario($dni);
?>