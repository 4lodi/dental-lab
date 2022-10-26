<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<link rel="stylesheet" href="{{asset('css/loginStyle.css')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/logo.png')}}">
	<link rel="icon" type="image/png" href="{{asset('img/logo.png')}}">
	<title>Laboratorio Dental</title>
</head>


<body>
	<div id="particles-js"></div>
	<div class="login-container">
		@yield('content')

	</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

	<script src="{{asset('js/particles.min.js')}}"></script>
	<script src="{{asset('js/appParticula.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
</body>

</html>