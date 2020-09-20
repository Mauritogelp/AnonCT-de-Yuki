<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>anonct</title>
	<!--materialize core-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!--iconos materialize-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--estilos-->
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="grey darken-3">
	<!--categorías-->
	<ul id="categorias" class="dropdown-content">
	  <li><a class="truncate" href="#!">jeje ta mal</a></li>
	  <li><a class="truncate" href="#!">jeje ta bom</a></li>
	  <li class="divider"></li>
	  <li><a class="truncate" href="#!">jeje nose</a></li>
	  <li><a class="truncate" href="#!">jeje aca el limtie</a></li>
	</ul>
	<!--notificaciones-->
	<ul id="notificaciones" class="dropdown-content">
	  <li><a class="truncate" href="#!">vacío</a></li>
	  <li><a class="truncate" href="#!">vacío</a></li>
	  <li><a class="truncate" href="#!">vacío</a></li>
	</ul>
	<!--menú-->
	<nav class="grey darken-4">
	  <div class="nav-wrapper container">
	    <a href="#" class="brand-logo">AnonCT<span id="version" style="font-size:10px">v0.24.1</span></a>
	    <ul class="right hide-on-med-and-down">
	      <li id="estado_usuario">
	      	<div v-if="bloqueado == false">
		      	<a v-if="autentificado == false" @click="autentificar_ahora" class="waves-effect btn green" title="No estás autentificado!!" href="#">
		      		<i class="material-icons">lock_outline</i>
		      	</a>
		      	<a v-if="autentificado == true" @click="usuario_autentificado" class="waves-effect btn green" href="#">
		      		<i class="material-icons">verified_user</i>
		      	</a>
	      	</div>
	      	<a v-if="bloqueado == true" @click="usuario_bloqueado" class="waves-effect btn red" href="#">
	      		<i class="material-icons">lock_outline</i>
	      	</a>
	      </li>
	      <li>
	      	<a class="dropdown-trigger" href="#" data-target="notificaciones">notificaciones<i class="material-icons right">notifications</i></a>
	      </li>
	      <li id="crear_publicacion">
	      	<a class="modal-trigger" href="#crear_publicacion_modal">Nuevo<i class="material-icons right">create</i></a>
	      </li>
	      <li>
	      	<a class="dropdown-trigger" href="#" data-target="categorias">Categorías<i class="material-icons right">arrow_drop_down</i></a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<!--main-->
	<div id="contenedor">
		<section id="publicacion" class="grey darken-3 white-text">
			<a href="publicacion" id="contenedor_publicacion">
				<div class="row">
					<div class="col s3">
						<div id="contenedor_publicacion_imagen">
							<img src="prueba.jpg" alt="publicaciones" id="publicacion_imagen">
						</div>
					</div>
					<div class="col s9">
						<div class="row">
							<!--titulo-->
							<div class="col s10 truncate">
								<h4>el título</h4>
							</div>
							<!--comentarios-->
							<div class="col s2 white-text right-align" id="publicacion_comentarios">
								<p>30<i class="material-icons">chat</i></p>
							</div>
							<!--cuerpo publicacion-->
							<div class="col s10 white-text">
								<p>
									contenido jejeel contenido jejeel contenido jejeel contenido jejeel contenido jejeel contenido jeje
								</p>
							</div>
							<!--fecha-->
							<div class="col s10 white-text" id="publicacion_fecha">
								<code>fecha: <span>17/8/2020 a las 18:00hs</span></code>
							</div>
						</div>
					</div>
				</div>
			</a>
			<div id="separador"></div>
		</section>
	</div>
	<!--publicacion-->
  <div id="crear_publicacion_modal" class="modal grey darken-3">
    <div class="modal-content">
      <div v-if="cargando_imagen == false" id="publicacion_modal_imagen" class="center-align">
      	<input @change="cambiar_imagen" type="file" id="modal_cambiar_imagen" style="position: absolute;visibility: hidden;">
      	<label for="modal_cambiar_imagen">
      		<img :src="imagen" alt="subir imagen" id="modal_imagen_subida">
      	</label>
      </div>
      <h3 v-if="cargando_imagen == true" class="center-align white-text">CARGANDO...</h3>
      <p class="col s12 center-align white-text">subir imagen</p>
      
      <div class="input-field col s12">
        <input v-model="titulo" id="modal_titulo" type="text" class="validate white-text">
        <label for="modal_titulo">Título</label>
      </div>
      <div class="input-field col s12">
       <textarea v-model="contenido" id="textarea1" class="materialize-textarea validate white-text"></textarea>
       <label for="textarea1">Contenido</label>
      </div>
    </div>
    <div class="modal-footer grey darken-3">
      <a v-if="cargando_publicacion == false" href="#!" class="modal-close waves-effect white waves-green btn-flat">Cancelar</a>
      <a v-if="cargando_publicacion == false" href="#!" @click="subir_publicacion_ahora" class="waves-effect white waves-green btn-flat">Crear</a>
      <a v-if="cargando_publicacion == true" href="#!" class="waves-effect white waves-green btn-flat">Cargando...</a>
    </div>
  </div>
	<!--scripts-->
	<!--materialize-->
	<script src="materialize/funcionalidad_js.js"></script>
	<script src="materialize/menu.js"></script>
	<script src="materialize/modal.js"></script>
	<!--vue-->
	<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"></script>
	<script src="vue/crear_pub.js"></script>
	<script src="vue/alertas.js"></script>
	<script src="vue/usuario.js"></script>
	<!--sweetAlert2-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>