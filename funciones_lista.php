<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('conexion.php');
class Funciones_Lista extends Conexion {
	function __construct() {

	}
	public function prueba() {
		echo 'Funciopno';
	}
	public function lista() {
		$data = $this->conexion()->query("SELECT * FROM aula_catcentrostrabajo", PDO::FETCH_OBJ);
		return $data;
	}
	public function lista2() {
        $consulta = "SELECT a.clavecct, b.CentroTrabajo, b.Id_NumeroOrden, MAX(b.Fecha_Orden) as Fecha_Orden, d.Nombre_AreaAtencion FROM aula_catcentrostrabajo as a 
        LEFT JOIN ateusu_solicitudservicio as b on a.clavecct = b.CentroTrabajo
        LEFT JOIN aula_catmunicipios as c on a.municipio = c.id_municipio 
        LEFT JOIN ateusu_areaatencion as d on b.Id_Area_Atiende = d.Id_AreaAtencion
        WHERE (c.coordinacion_id = 9) AND (b.Fecha_Orden < '2015-02-05')
        AND (b.CentroTrabajo NOT IN (SELECT centro_trabajo FROM ateusu_llamadasservicio))
        GROUP BY a.clavecct";
        $consulra2 = "SELECT a.Id_NumeroOrden, a.CentroTrabajo, COUNT(a.CentroTrabajo), MAX(a.Fecha_Orden) as Fecha_Orden,                                           b.Nombre_AreaAtencion FROM ateusu_solicitudservicio as a  
        LEFT JOIN ateusu_areaatencion as b on a.Id_Area_Atiende = b.Id_AreaAtencion  
        LEFT JOIN aula_catcentrostrabajo as c on a.CentroTrabajo = c.clavecct 
        WHERE (a.Id_Coordinacion = 9) AND (a.Fecha_Orden < '2015-02-05') AND (a.CentroTrabajo NOT IN (SELECT centro_trabajo FROM ateusu_llamadasservicio)) 
        GROUP BY a.CentroTrabajo HAVING COUNT(a.CentroTrabajo)>0 ORDER BY a.Fecha_Orden ASC";
		$data = $this->conexion()->query($consulta, PDO::FETCH_OBJ);
		return $data;
	}
}
 ?>