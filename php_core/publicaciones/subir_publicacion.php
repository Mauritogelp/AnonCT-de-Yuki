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
			#verifico que se haya insertado una imágen
			if ($this->imagen != 'prueba_modal.jpg') {
				//pasó sin problemas
			}else{
				$mensaje = "La imágen es obligatória";
				$this->error_json($mensaje);				
			}
			#verifico si la imágen exíste
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
		public function crear_publicacion_ahora(){
			$this->conectar_bd();
			//escapo de caracteres especiales
			$ip = $this->conexion->real_escape_string($ip);
			//
			$query = "SELECT usuario FROM usuarios WHERE usuario LIKE '$ip'";
			$ip_bd = $this->conexion->query($query);
			$ip_json = $ip_bd->fetch_assoc();
			$query = "INSERT INTO publicaciones ";
			$
			$this->desconectar_bd();
		}
	}
	$imagen = $_POST['imagen'];
	$titulo = $_POST['titulo'];
	$contenido = $_POST['contenido'];
	$publicacion = new crear_publicacion($imagen,$titulo,$contenido);
	$publicacion->verificar_estado_usuario();
	$publicacion->verificar_existe_categoria();
	$publicacion->verificar_imagen();
	$publicacion->verificar_titulo();
	$publicacion->verificar_contenido();
	$publicacion->crear_publicacion_ahora();
	$publicacion->listo();
?>