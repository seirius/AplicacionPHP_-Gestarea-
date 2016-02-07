<?php
$servername = "localhost";
$username = "andriy";
$password = "andriy";
$dbname = "gestarea";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
	die("Conexion fallida: " . $connection->connect_error);
}
?>
