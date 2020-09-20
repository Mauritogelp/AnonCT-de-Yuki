<?php
	require '../herramientas.php';
	class crear_publicacion extends herramientas{
		private $imagen;
		private $categoria;
		private $titulo;
		private $contenido;
		public function __construct($ima,$cat,$tit,$con){
			$this->imagen = $ima;
			$this->categoria = $cat;
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
		public function verificar_categoria(){
			$this->conectar_bd();
			//escapo caracter especial
			$this->categoria = $this->conexion->real_escape_string($this->categoria);
			//
			$query = "SELECT COUNT(*) AS cantidad FROM categorias WHERE id = '$this->categoria' LIMIT 1";
			$cantidad_bd = $this->conexion->query($query);
			$this->desconectar_bd();
			$cantidad_json = $cantidad_bd->fetch_assoc();
			if (intval($cantidad_json['cantidad']) != 0) {
				//pasó sin problemas
			}else{
				$mensaje = "La categoría no exíste, reinicie la página";
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
			$ip = $this->conexion->real_escape_string($_SERVER['REMOTE_ADDR']);
			$this->categoria = $this->conexion->real_escape_string($this->categoria);
			$this->titulo = $this->conexion->real_escape_string($this->titulo);
			$this->contenido = $this->conexion->real_escape_string($this->contenido);
			//
			$query = "SELECT id FROM usuarios WHERE usuario LIKE '$ip' LIMIT 1";
			$id_bd = $this->conexion->query($query);
			$id_json = $id_bd->fetch_assoc();
			$query = "INSERT INTO publicaciones(id_usuario,id_categoria,imagen,titulo,contenido,habilitado) 
			VALUES ('".$id_json['id']."','$this->categoria','$this->imagen','$this->titulo','$this->contenido',0)";
			$this->conexion->query($query);
			$this->desconectar_bd();
		}
	}
	$imagen = $_POST['imagen'];
	$categoria = $_POST['categoria'];
	$titulo = $_POST['titulo'];
	$contenido = $_POST['contenido'];
	$publicacion = new crear_publicacion($imagen,$categoria,$titulo,$contenido);
	$publicacion->verificar_estado_usuario();
	$publicacion->verificar_categoria();
	$publicacion->verificar_imagen();
	$publicacion->verificar_titulo();
	$publicacion->verificar_contenido();
	$publicacion->crear_publicacion_ahora();
	$publicacion->listo();
?>