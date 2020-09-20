<?php
	require '../herramientas.php';
	session_start();
	class autentificar_ahora extends herramientas{
		private $ip;
		public function verificar_existe_usuario(){
			$this->conectar_bd();
			//escapo de los caracteres especiales
			$this->ip = $this->conexion->real_escape_string($_SERVER['REMOTE_ADDR']);
			//
			$query = "SELECT habilitado,usuario FROM usuarios WHERE usuario LIKE '$this->ip'";
			$ip_bd = $this->conexion->query($query);
			$this->desconectar_bd();
			$ip_json = $ip_bd->fetch_assoc();
			if ($ip_json == null) {
				//pasó sin problemas
			}else{
				$this->verificar_usuario_bloqueado($ip_json);
			}
		}
		private function verificar_usuario_bloqueado($ip_json){
			if (intval($ip_json['habilitado']) == 0) {
				$this->listo($ip_json['usuario']);
			}else{
				$this->bloquear_usuario();
			}
		}
		public function crear_usuario(){
			$this->conectar_bd();
			$query = "INSERT INTO usuarios(usuario) VALUES ('$this->ip')";
			$this->conexion->query($query);
			$this->desconectar_bd();
			$this->listo();
		}
		private function listo(){
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$corr['bloqueo'] = false;
			$corr['autentificado'] = true;
			$corr['correcto'] = true;
			echo json_encode($corr);
			die();
		}
		private function bloquear_usuario(){
			$_SESSION['bloqueado'] = true;
			$err['bloqueo'] = true;
			$err['autentificado'] = null;
			$err['error'] = true;
			echo json_encode($err);
			die();
		}
	}
	$usuario = new autentificar_ahora();
	$usuario->verificar_existe_usuario();
	$usuario->crear_usuario();
?>