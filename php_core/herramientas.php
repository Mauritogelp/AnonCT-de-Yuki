<?php
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
		public function verificar_ip_segura(){
			$ip = $_SERVER['REMOTE_ADDR'];
			if (strlen($ip) < 60 && strlen($ip) > 0) {
				//pasó sin problemas
			}else{
				$mensaje = "IP Spoofing detectado, desactiva el programa o reinicia tu router";
				$this->error_json($mensaje);
			}
		}
	}
?>