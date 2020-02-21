<style>
.bd-placeholder-img {
	font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
@media (min-width: 768px) {
	.bd-placeholder-img-lg {
    	font-size: 3.5rem;
    }
}
</style>
<link href="../recursos/css/login.css" rel="stylesheet">
	<form class="form-signin" method="post" action="">
		<img class="mb-4" src="../recursos/imagenes/huella.jpg" alt="" width="100" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Iniciar Sesion</h1>
		<label for="inputEmail" class="sr-only">Usuario</label>
		<input type="text" id="usuario" name= "usuario"class="form-control" placeholder="Usuario" required>
		<label for="inputPassword" class="sr-only">Contraseña</label>
		<input type="password" id="clave" name="clave" class="form-control" placeholder="Contraseña" required>
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="remember-me" name="recordar"> Recordar Contraseña
			</label>
  		</div>
  	<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
</form>

