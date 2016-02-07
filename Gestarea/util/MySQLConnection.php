<?php

class MySQLConnection {
	
	private $connection;
	
	private $servername = "localhost";
	private $username = "andriy";
	private $password = "andriy";
	private $dbname = "gestarea";
	
	public function __construct() {
		$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		
		if ($this->connection->connect_error) {
			die("Conexion fallida: " . $this->connection->connect_error);
		}
	}
	
	public function getConnection() {
		return $this->connection;
	}
	
	public function close() {
		$this->connection->close();
	}
	
}

?>