<?php
	require '../herramientas.php';
	class verificar_usuario{
		private $bloquear;
		public function verificar_usuario_bloqueado(){
			if (!isset($_SESSION['bloqueado'])) {
				//pasó sin problemas
			}else{
				$this->usuario_bloqueado();
			}
		}
		public function verificar_usuario_autentificado(){
			if (!isset($_SESSION['ip'])) {
				//pasó sin problemas
			}else{
				$corr['bloqueo'] = false;
				$corr['autentificado'] = true;
				echo json_encode($corr);
				die();
			}
		}
		public function verificar_ip_segura(){
			if (strlen($_SERVER['REMOTE_ADDR']) < 35) {
				//paso sin problemas
			}else{
				$this->usuario_bloqueado();
			}
		}
		public function usuario_no_autentificado(){
			$err['bloqueo'] = false;
			$err['autentificado'] = false;
			echo json_encode($err);
			die();
		}
		private function usuario_bloqueado(){
			$err['bloqueo'] = true;
			$err['autentificado'] = null;
			$_SESSION['bloqueado'] = true;
			echo json_encode($err);
			die();
		}
	}
	$usuario = new verificar_usuario();
	$usuario->verificar_usuario_bloqueado();
	$usuario->verificar_usuario_autentificado();
	$usuario->verificar_ip_segura();
	$usuario->usuario_no_autentificado();
?>