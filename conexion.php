<?php
class Conexion {

	public function conexion(){
		try {
			$pdo = new PDO('mysql:dbname=pruebas;host=localhost','root','root');
		} catch (PDOException $e) {
			die("ERROR: No fue posible conectar: " .$e->getMessage());
		}
		return $pdo;
	}
}
 ?>