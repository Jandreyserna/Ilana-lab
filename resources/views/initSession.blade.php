@extends('templates.header')

@section('content')
<div class="contenedor-cuadro col-sm-12 col-lg-3">

	<p style="text-align: center;"><img src="{{URL::asset('img/logo.png')}}" alt="" class="rounded img-fluid d-inline-block align-text-top" ></p>
	<h2 style="text-align: center;">Acceder</h2>
	<div class="contenedor-formulario">
		<form action="/login" method="post" name="Formulario">
			{{ csrf_field() }}
			<input type="email" name="email"  class="form-control" required placeholder="Correo electrónico o usuario">
			<input type="password" name="pass" class= "form-control" placeholder="Contraseña" required>
			<div class="botonSesion">
				<button type="submit" class="botonLargo">Iniciar Sesión</button>	
			</div>	
		</form>
	</div>
	<div class="contenedor-referencias">
		<p style="font-size: small;"> 
			<a href="/registrarse" style="text-align: left;">Crear Cuenta </a>
			<a href="/recuperar-contrasena" style="margin-left: 15%;">¿Olvidaste tu contraseña? </a>
		</p>
	</div>
</div>

@endsection