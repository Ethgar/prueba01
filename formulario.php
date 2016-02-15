<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');
include('funciones.php');
$data = new Funciones;

$form = array(
	'action' => 'formulario.php',
	'data' => array(
		0 => array('type' => 'text', 'name' => 'nombre'),
		1 => array('type' => 'text', 'name' => 'apellido_p'),
		2 => array('type' => 'text', 'name' => 'apellido_m'))
	);
$datos = $data->formulario($form);

//echo $datos;

 ?>