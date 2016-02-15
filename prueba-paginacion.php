<style>
	.contenedor-paginas {
		margin: 0 auto;
		background-color: #B1B1B1;

	}
	.contenedor-paginas{
		background-color: #107B1B;
		color: #FFF;
		font-weight: bold;
	}
</style>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('funciones.php');
$funciones = new Funciones;

if (isset($_GET['pagina'])) {
	$pagina = $_GET['pagina'];
}else{
	$pagina = 1;
}
$registros = 20;
$data = $funciones->paginacion($pagina, $registros);

echo $data;
 ?>