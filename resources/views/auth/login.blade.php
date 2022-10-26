@extends('layout.loginAndRegister')

@section('content')
<div class="login-info-container">
	<h2 class="title">Ingresar</h2>
	<img style="width:30%" src="img/logo.png">
	<form class="inputs-container" action="/login" method="POST" autocomplete="off">
		@csrf
		@include('layout.partials.messages')
		<div class="form-floating" mb-3>
			<input type="text" class="form-control" value="{{old('name')}}" placeholder="Nombre de usuario o Email" id="name" name="name">
			<label for="" class="form-label">Nombre de usuario o Email</label>
		</div>
		<div class="form-floating" mb-3>
			<input class="form-control" name="password" type="password" placeholder="Contraseña">
			<label for="" class="form-label">Contraseña</label>
		</div>
		<input type="submit" class="btn btn-info" value="Ingresar">
	</form>
</div>
<img class="image-container" src="img/woman.svg" alt="enfermera" style="width:50%; height: 100%; ">
@endsection