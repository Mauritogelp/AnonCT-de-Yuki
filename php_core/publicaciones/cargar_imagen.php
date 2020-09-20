<?php
	require '../herramientas.php';
	class cargar_imagen extends herramientas{
		private $nombre_imagen;
		private $peso_imagen;
		private $formato_imagen;
		private $imagen;
		private $ubicacion;
		public function __construct($ima){
			$this->nombre_imagen = $ima['name'];
			$this->peso_imagen = $ima['size'];
			$this->formato_imagen = $ima['type'];
			$this->imagen = $ima['tmp_name'];
		}
		public function verificar_peso(){
			if (intval($this->peso_imagen) < 10000000) {
				//pasó sin problemas
			}else{
				$mensaje = "La imagen pesa demasiado";
				$this->error_json($mensaje);
			}
		}
		public function verificar_nombre(){
			if (intval($this->nombre_imagen) < 100) {
				//pasó sin problemas
			}else{
				$mensaje = "La imagen tiene un nombre muy largo";
				$this->error_json($mensaje);
			}
		}
		public function verificar_formato(){
			if (exif_imagetype($this->imagen)) {
				//pasó sin problemas
			}else{
				$mensaje = "Solo se admiten imágenes";
				$this->error_json($mensaje);
			}
		}
		public function subir_imagen(){
			$this->ubicacion = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP123456").$this->nombre_imagen;
			move_uploaded_file($this->imagen, $_SERVER['DOCUMENT_ROOT']."/anonct_rework/img/publicaciones/".$this->ubicacion);
		}
		public function listo(){
			$corr['imagen'] = "img/publicaciones/".$this->ubicacion;
			$corr['correcto'] = true;
			echo json_encode($corr);
		}
	}
	$image = $_FILES['imagen'];
	$imagen = new cargar_imagen($image);
	$imagen->verificar_estado_usuario();
	$imagen->verificar_peso();
	$imagen->verificar_nombre();
	$imagen->verificar_formato();
	$imagen->subir_imagen();
	$imagen->listo();
?>