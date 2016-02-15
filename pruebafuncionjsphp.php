<script src="jquery/jquery-1-9-1.js"></script>

<?php 
include('funciones.php');

 ?>

 <script>
	$(document).ready(function() {
		variable = $.post('funciones.php?funcion=prueba_jquery&pa1=2&pa2=3');
		
    	
	})
</script>