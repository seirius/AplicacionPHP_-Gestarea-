<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root."/Gestarea/modelo/service/ServiceUsuario.php";

$dni = $_GET["dni"];
$pw = $_POST["password"];

$sUsuario = new ServiceUsuario();
$sUsuario->modificarPassword($dni, $pw);

?>