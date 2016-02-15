<?php 
include('funciones.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');
$array[0]= array(
				0 => array( 'nombre' => 'Edgar',
							'apellido' => 'Martinez'),
				1 => array('nombre' => 'Yolansa',
							'apellido' => 'De Haro'),
				2 => array('nombre' => 'Elias',
							'apellido' => 'Martinez'),
				3 => array('nombre' => 'Eduardo',
							'apellido1' => 'Huerta',
							'apodo3' => 'lalo',
							'apodo4' => 'loco',
							'apellido2' => 'Huerta',
							'apod5' => 'lalo',
							'apellido3' => 'Huerta',
							'apodo6' => 'lalo',
							'apellido4' => 'Huerta',
							'apodo7' => 'lalo',
							'apellido5' => 'Huerta',
							'apodo8' => 'lalo',
							'apellido6' => 'Huerta',
							'apodo9' => 'lalo',
							'apellido7' => 'Huerta',
							'apodo10' => 'lalo',
							'apellido8' => 'Huerta',
							'apodo11' => 'lalo',
							'apellido9' => 'Huerta',
							'apodo12' => 'lalo',
							'apellido10' => 'Huerta',
							'apodo13' => 'lalo',
							'apellido11' => 'Huerta',
							'apodo14' => 'lalo',
							'apellido12' => 'Huerta',
							'apodo15' => 'lalo',
							'apellido13' => 'Huerta',
							'apodo16' => 'lalo',
							'apellido4' => 'Huerta',
							'apodo17' => 'lalo',
							'apellido15' => 'Huerta',
							'apodo17' => 'lalo',
							'apellido16' => 'Huerta',
							'apodo19' => 'lalo',)
	);
echo '<pre>';
print_r($array);
echo '<pre>';

$data = new Funciones;
$datos = $data->parsea_dos($array);

$url = 'http://207.248.56.243//Paulino';
//$url = "http://cybmeta.com/comprobar-en-php-si-existe-un-archivo-o-una-url/";
$urlexists = url_exists($url);

if ($urlexists == true) {
	echo 'Esiste';
}else{
	echo 'No Existe';
}

function url_exists( $url = NULL ) {

    if(( $url == '' ) ||( $url == NULL ) ){
        return false;
    }

    $headers = @get_headers( $url );
    sscanf($headers[0], 'HTTP/%*d.%*d %d', $httpcode);

    //Aceptar solo respuesta 200 (Ok), 301 (redirección permanente) o 302 (redirección temporal)
    $accepted_response = array(200,301,302);
    if( in_array( $httpcode, $accepted_response ) ) {
        return true;
    } else {
        return false;
    }

}
 ?>