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
	      <li><a class="dropdown-trigger" href="#" data-target="notificaciones">notificaciones<i class="material-icons right">notifications</i></a></li>
	      <li><a class="modal-trigger" href="#crear_publicacion">Nuevo<i class="material-icons right">create</i></a></li>
	      <li><a class="dropdown-trigger" href="#" data-target="categorias">Categorías<i class="material-icons right">arrow_drop_down</i></a></li>
	    </ul>
	  </div>
	</nav>
	<!--main-->

	<!-- Modal Structure -->
  <div id="crear_publicacion" class="modal grey darken-3">
    <div class="modal-content white-text">
      <div id="publicacion_modal_imagen">
      	<input type="text" id="cambiar_imagen" style="position: absolute;visibility: hidden;">
      	<label for="cambiar_imagen">
      		<img src="prueba_modal.jpg" alt="subir imagen">
      	</label>
      </div>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
	<!--scripts-->
	<script src="materialize/funcionalidad_js.js"></script>
	<script src="materialize/menu.js"></script>
	<script src="materialize/modal.js"></script>
	
</body>
</html>