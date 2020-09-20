<?php
	#es muy importante traer almenos 1 cateogría o va a saltar tremendo error
	#y me da una re paja fixear esta mierda
	require 'php_core/herramientas.php';
	class traer_categorias extends herramientas{
		public function traer_ahora(){
			$this->conectar_bd();
			$query = "SELECT * FROM categorias";
			$categorias_bd = $this->conexion->query($query)or die("error fatal, no hay categorías culap de los admins");
			$this->desconectar_bd();
			return $categorias_bd;
		}
	}
	$categoria = new traer_categorias();
	$categorias_bd = $categoria->traer_ahora();
	$categorias_bd2 = $categoria->traer_ahora();
?>