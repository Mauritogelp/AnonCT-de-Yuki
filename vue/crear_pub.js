var crear_pub = new Vue({
	el:"#crear_publicacion_modal",
	data:{
		cargando_imagen:false,
		cargando_publicacion:false,
		imagen:"prueba_modal.jpg",
		titulo:"",
		contenido:"",
	},
	methods:{
		cambiar_imagen:function(event){
			this.cargando_imagen = true;
			let formData = new FormData();
			formData.append('imagen',event.target.files[0]);
			if (event.target.files[0].size/1024/1024 < 10) {
				this.$http.post("php_core/publicaciones/cargar_imagen.php",formData).then(function(respuesta){
					if (typeof(respuesta.body.correcto) != 'undefined') {
						this.imagen = respuesta.body.imagen;
						this.cargando_imagen = false;
					}else if(typeof(respuesta.body.error) != 'undefined'){
						alerta.error(respuesta.body.error);
						this.cargando_imagen = false;
					}
				});
			}else{
				alerta.error("el archivo pesa más de 10MB");
			}
		},
		subir_publicacion_ahora:function(){
			if (usuario.bloqueado == false) {
				if (this.titulo.length != 0) {
					if (this.contenido.length != 0) {
						this.cargando_publicacion = true;
						let formData = new FormData();
						formData.append('imagen',this.imagen);
						formData.append('titulo',this.titulo);
						formData.append('contenido',this.contenido);
						this.$http.post("php_core/publicaciones/subir_publicacion.php",formData).then(function(respuesta){
						console.log(respuesta);
						if (typeof(respuesta.body.correcto) != 'undefined') {
							//cargar citio
							//location(respuesta.body.url)
						}else if(typeof(respuesta.body.error) != 'undefined'){
							alerta.error(respuesta.body.error);
							this.cargando_publicacion = false;
						}
						})
					}else{
						alerta.error("El contenido es obligatorio");
					}
				}else{
					alerta.error("El título es obligatorio");
				}
			}else{
				alerta.error("estás baneado, no podés realizar esta acción")
			}
		}
	}
})