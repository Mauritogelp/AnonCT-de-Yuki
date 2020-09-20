var usuario = new Vue({
	el:"#estado_usuario",
	data:{
		bloqueado:false,
		autentificado:false,
	},
	created:function(){
		this.$http.get("php_core/usuario/verificar_usuario.php").then(function(respuesta){
			this.bloqueado = respuesta.body.bloqueo;
			this.autentificado = respuesta.body.autentificado;
		})
	},
	methods:{
		usuario_bloqueado:function(){ 
			alerta.error("estás baneado, vuelve en 5 minutos");
		},
		autentificar_ahora:function(){
			this.$http.get("php_core/usuario/autentificar_ahora.php").then(function(respuesta){
				if (typeof(respuesta.body.correcto) != 'undefined') {
					this.bloqueado = respuesta.body.bloqueo;
					this.autentificado = respuesta.body.autentificado;					
				}else if(typeof(respuesta.body.error) != 'undefined'){
					this.bloqueado = respuesta.body.bloqueo;
					this.autentificado = respuesta.body.autentificado;
				}
			}) 
		},
		usuario_autentificado:function(){
			Swal.fire({
			  icon: 'success',
			  title: 'Ya estás autentificado',
			  text: 'ya aceptaste los usos y terminos de condiciones',
			  confirmButtonText: 'Entendido!',
			  footer: `<a href="#" onclick="alert('falta terminar esto jeje ta mal, ta muy pero muy mal')">leer que acepté</a>`
			})
		}
	}
})