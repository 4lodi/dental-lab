@extends('layout.loginAndRegister')
@section('content')
<div class="login-info-container">
	<h2 class="title">Registrar</h2>
	<img style="width:30%" src="img/logo.png">
	<form class="inputs-container" action="/register" method="POST" autocomplete="off">
		@csrf
		@include('layout.partials.messages')
		<div class="form-floating" mb-3>
			<input type="text" class="form-control" value="{{old('name')}}" placeholder="Nombre y apellido" id="name" name="name">
			<label for="" class="form-label">Nombre y apellido</label>
		</div>
		
		<div class="form-floating" mb-3>
			<input class="form-control" name="email" value="{{old('email')}}" type="email" placeholder="Email">
			<label for="" class="form-label">Email</label>
		</div>
		
		<div class="form-floating" mb-3>
			<input class="form-control" name="password" type="password" placeholder="Contraseña">
			<label for="" class="form-label">Contraseña</label>
		</div>
		
		<div class="form-floating" mb-3>
			<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña">
			<label for="" class="form-label">Confirmar Contraseña</label>
		</div>
		

		<input type="submit" class="btn btn-info" value="Registrarse">
		<br>
		<br>
		<p>Si ya tienes Cuenta <span class="span"><a class="span" href="/login">Ingresa aqui</a></span></p>
	</form>
</div>
<img class="image-container" src="img/woman.svg" alt="enfermera" style="width:50%; height: 100%; ">
@endsection