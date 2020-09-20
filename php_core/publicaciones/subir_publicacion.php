<?php
	require '../herramientas.php';
	class crear_publicacion extends herramientas{
		private $imagen;
		private $titulo;
		private $contenido;
		public function __construct($ima,$tit,$con){
			$this->imagen = $ima;
			$this->titulo = $tit;
			$this->contenido = $con;
		}
		public function verificar_imagen(){
			if (file_exists($_SERVER['DOCUMENT_ROOT']."/anonct_rework/".$this->imagen)) {
				//pasó sin problemas
			}else{
				$mensaje = "La imagen no exíste, reintente";
				$this->error_json($mensaje);
			}
		}
		public function verificar_titulo(){
			if (strlen($this->titulo) != 0) {
				//pasó sin problemas
			}else{
				$mensaje = "El título es obligatório";
				$this->error_json($mensaje);
			}
		}
		public function verificar_contenido(){
			if (strlen($this->contenido) != 0) {
				//pasó sin problemas
			}else{
				$mensaje = "El contenido es obligatório";
				$this->error_json($mensaje);
			}			
		}
		#TENGO Q VERIFICAR Y TENER LA IP DEL USUARIO
		public function crear_publicacion_ahora(){
			$this->conectar_bd();
			$ip = password_hash($_SERVER['REMOTE_ADDR'], PASSWORD_BCRYPT, ['cost' => 11]);
			//escapo de caracteres especiales
			$ip = $this->conexion->real_escape_string($ip);
			//
			$query = "INSERT INTO publicaciones ";
			$this->desconectar_bd();
		}
	}
	$imagen = $_POST['imagen'];
	$titulo = $_POST['titulo'];
	$contenido = $_POST['contenido'];
	$publicacion = new crear_publicacion($imagen,$titulo,$contenido);
	$publicacion->verificar_imagen();
	$publicacion->verificar_titulo();
	$publicacion->verificar_contenido();
	$publicacion->crear_publicacion_ahora();
	$publicacion->listo();
?>