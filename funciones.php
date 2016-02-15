<?php
include('conexion.php');
class Funciones extends Conexion {
	public $consulta = 'valor';
	public $tabla;
	function __construct() {
		parent::__construct();
	}
	public function parsea_array($array) {
		$b = 65;
		for ($i=0; $i < sizeof($array[0]); $i++) { 
			foreach ($array[0][$i] as $key => $value) {
				echo $key.'->'.$value.'<br>';
				for ($j=0; $j < sizeof($array[0][$i]); $j++) { 
					
					$limite = (65+sizeof($array[0][$i])-1);
					if ($b > $limite) {
						$b = 65;
					}
					$array2[0][$i][$b] = $value;
				}
				$b++;		
			}
		}
		print_r($array2);
	}

	public function parsea_dos($array) {
		
		for ($i=0; $i < sizeof($array[0]); $i++) {
		$j = 65;
		$b = 65; 
			foreach ($array[0][$i] as $key => $value) {
				//for ($j=65; $j < 65+(sizeof($array[0][$i])); $j++) { 
					$limite_array = (sizeof($array[0][$i]));
					$limite_alfabeto = 90;
					if ($j <= 90 ) {
						$prueba_array[$i][chr($j)] = $value;
						$j++;
					} else if($j >= 90) {
						$prueba_array[$i][chr(65).chr($b)] = $value;
						$b++;
					}
				//}
							
			}
		}
		print_r($prueba_array);
	}
	public function formulario($form) {
		$formulario = '<form action="'.$form['action'].'">';
		for ($i=0; $i < sizeof($form['data']) ; $i++) { 
			$formulario .= '<label for="'.$form['data'][$i]['name'].'">'.$form['data'][$i]['name'].'</label><input type="'.$form['data'][$i]['type'].' name="'.$form['data'][$i]['name'].'><br>';
				
			
		}
		$formulario .= '</form>';
		echo $formulario;
		
	}


	public function paginacion($pagina = 0, $registros = 0) {

		$data_registros = $this->conexion()->query("SELECT COUNT(*) as cantidad FROM aula_catcentrostrabajo WHERE municipio = 41", PDO::FETCH_OBJ);
		foreach ($data_registros as $datos) {
			$cantidad = $datos->cantidad;
		}
		
		$inicio = (($pagina-1) * $registros);
		$paginas = ceil($cantidad/$registros);
		
		$data = $this->conexion()->query("SELECT * FROM aula_catcentrostrabajo LIMIT $inicio, $registros", PDO::FETCH_OBJ);
		$tabla = '<table>
					<tr><th>Clave Centro de Trabajo</th><th>Nombre Centro de Trabajo</th></tr>';
		foreach ($data as $centro) {
			$tabla .= '<tr><td>'.$centro->clavecct.'</td><td>'.$centro->nombrect.'</td></tr>';
		}
		$paginas_link = '<div class="contenedor-paginas">';
		for($j = 1; $j <= $paginas; $j++){
			$paginas_link .= '<a href="prueba-paginacion.php?pagina='.$j.'">'.$j.'</a>';
		}
		$paginas_link .='</div>';

		$tabla .= '</table>'.$paginas_link;

		return $tabla;
		
		
	}
	public function prueba_jquery() {
		extract($_REQUEST);
   		echo $pa1+$pa2;
	}

	public function prueba_consultas() {

	}


}
?>