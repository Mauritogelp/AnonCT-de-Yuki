<?php
	session_start();
	class herramientas{
		private $host	  = "localhost";
		private $user 	  = "root";
		private $password = "";
		private $database = "anonct";

		protected $conexion;
		protected function conectar_bd(){
			$this->conexion = new mysqli($this->host,$this->user,$this->password,$this->database);
		}
		protected function desconectar_bd(){
			$this->conexion->close();
		}
		protected function error_json($mensaje){
			$err['error'] = $mensaje;
			echo json_encode($err);
			die();
		}
		protected function correcto_json($mensaje){
			$corr['correcto'] = $mensaje;
			echo json_encode($corr);
			die();
		}
		public function verificar_estado_usuario(){
			if (isset($_SESSION['ip'])) {
				//pasó sin problemas
			}else{
				if (isset($_SESSION['bloqueado'])) {
					$this->error_json('EStás baneado, no podés realizar esta acción');
				}
				$this->conectar_bd();
				$query = "SELECT habilitado FROM usuarios WHERE usuario LIKE '$_SERVER[REMOTE_ADDR]'";
				$ip_bd = $this->conexion->query($query);
				$this->desconectar_bd();
				$ip_json = $ip_bd->fetch_assoc();
				if ($ip_json == null) {
					$mensaje = "Tenés que verificarte antes de hacer ésto!";
					$this->error_json($mensaje);
				}else{
					//pasó sin problemas
				}
			}
		}
	}
?>