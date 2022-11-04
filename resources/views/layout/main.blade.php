<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/logo.png')}}">
	<link rel="icon" type="image/png" href="{{asset('img/logo.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Laboratorio Dental</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>



	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/material-dashboard.css')}}">
	<link href="{{asset('demos/demo.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/estilo.css')}}">


	@yield('css')




</head>

<body class="">
	<div class="wrapper ">
		<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{asset('img/sidebar-1.jpg')}}">
			<!--
Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

Tip 2: you can also add an image using data-image tag
-->
			<div class="logo"><a href="/home" class="simple-text logo-normal">
					<i><img src="{{asset('img/logo.png')}}" width="50px"></i>Laboratorio Dental
				</a></div>	
			@auth	
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="nav-item active ">
						<a class="nav-link" href="/index">
							<i class="material-icons">app_registration</i>
							<p>Ingresar Trabajos</p>
						</a>
					</li>
					<li class="nav-item active ">
						<a class="nav-link" href="/index">
							<i class="material-icons">playlist_add_check</i>
							<p>Consultar Trabajos</p>
						</a>
					</li>
					<li class="nav-item active ">
						<a class="nav-link" align="justify" href="/index">
							<i class="material-icons">local_hospital</i>
							<p>Ingresar Centros Medicos / Doctores</p>
						</a>
					</li>
					<li class="nav-item active ">
						<a class="nav-link" align="justify" href="/index">
							<i class="material-icons">update</i>
							<p>Nuevos Trabajos / Modificar Arancel</p>
						</a>
					</li>
				</ul>
			</div>
			@endauth
		</div>
		<div class="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
				<div class="container-fluid">
					@auth	
					<div class="navbar-wrapper">
						<a class="navbar-brand" href="/home">
								<i><img src="{{asset('img/logo.png')}}" width="50px"></i> 
									<b><p>Hola!!! {{auth()->user()->name??auth()->user()->nameauth()->user()->email}}</p></b>
						</a>
					</div>
					@endauth
					@auth
					<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="sr-only">Toggle navigation</span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end contenedor">
						<form class="navbar-form">
							<div class="input-group no-border">
							</div>
						</form>
						<ul class="navbar-nav">
							{{-- <li class="nav-item dropdown">
								<a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">circle_notifications</i>

									<span class="notification">
										<div id="countNotis"></div>
									</span>

									<p class="d-lg-none d-md-block" align="center">
										Notificaciones
									</p>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
									<label type="text" class="dropdown-item" href="#"><i class="material-icons">circle_notifications</i>Notificaciones</label>
									<div class="dropdown-divider"></div>
									@foreach (auth()->user()->unreadNotifications as $notification)



									@csrf
									@php
									$fechaActual = new \DateTime(now());
									$fechaTrabajo = new \DateTime($notification->data['fecha_termino']);

									$diferencia = $fechaTrabajo->diff($fechaActual)->format("%a")+1;

									@endphp

									@if($diferencia<= 1) <a href="{{route('sistema.consultar')}}" id="notis" class="dropdown-item notis">
										<i class="material-icons">bookmark_border</i>
										El trabajo N° {{ $notification->data['Numero_trabajo']}} <br>de {{ $notification->data['nombre_cliente']}} esta a punto de terminar.
										<br>Fecha: {{ $notification->data['fecha_termino']}} a las: {{ $notification->data['hora_termino']}}
										</a>
										@endif
										@endforeach

							</li> --}}
							<li class="nav-item dropdown">
								<a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">account_circle</i>
									<p class="d-lg-none d-md-block">
										Cuenta
									</p>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">

									<a class="dropdown-item" href="/index"><i class="material-icons">manage_accounts</i> Configuración</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="/logout"><i class="material-icons">logout</i> Cerrar Sesión</a>
								</div>
							</li>
						</ul>
					</div>
					@endauth
				</div>
			</nav>
			<!-- End Navbar -->


			<div class="content">



				<div class="container-fluid">
					<div class="col-md-12">
						@yield("content")
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{asset('js/jquery/jquery-3.6.1.min.js')}}"></script>
	<script>
		var notificaciones = document.querySelectorAll(".notis");
		var totalNotificaciones = notificaciones.length;

		document.getElementById("countNotis").innerHTML = "" + totalNotificaciones;
	</script>

	
	<script src="{{asset('js/core/popper.min.js')}}"></script>
	<script src="{{asset('js/core/bootstrap-material-design.min.js')}}"></script>
	<script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
	<script src="{{asset('js/plugins/sweetalert2.js')}}"></script>
	<script src="{{asset('js/plugins/jquery.validate.min.js')}}"></script>
	<script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
	<script src="{{asset('js/material-dashboard.min.js')}}"></script>
	<script src="{{asset('demos/demo.js')}}"></script>


	<script>
		$(document).ready(function() {
			$().ready(function() {


				$sidebar = $('.sidebar');

				$sidebar_img_container = $sidebar.find('.sidebar-background');

				$full_page = $('.full-page');

				$sidebar_responsive = $('body > .navbar-collapse');

				window_width = $(window).width();

				fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

				if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
					if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
						$('.fixed-plugin .dropdown').addClass('open');
					}

				}

				$('.fixed-plugin a').click(function(event) {
					// Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
					if ($(this).hasClass('switch-trigger')) {
						if (event.stopPropagation) {
							event.stopPropagation();
						} else if (window.event) {
							window.event.cancelBubble = true;
						}
					}
				});

				$('.fixed-plugin .active-color span').click(function() {
					$full_page_background = $('.full-page-background');

					$(this).siblings().removeClass('active');
					$(this).addClass('active');

					var new_color = $(this).data('color');

					if ($sidebar.length != 0) {
						$sidebar.attr('data-color', new_color);
					}

					if ($full_page.length != 0) {
						$full_page.attr('filter-color', new_color);
					}

					if ($sidebar_responsive.length != 0) {
						$sidebar_responsive.attr('data-color', new_color);
					}
				});

				$('.fixed-plugin .background-color .badge').click(function() {
					$(this).siblings().removeClass('active');
					$(this).addClass('active');

					var new_color = $(this).data('background-color');

					if ($sidebar.length != 0) {
						$sidebar.attr('data-background-color', new_color);
					}
				});

				$('.fixed-plugin .img-holder').click(function() {
					$full_page_background = $('.full-page-background');

					$(this).parent('li').siblings().removeClass('active');
					$(this).parent('li').addClass('active');


					var new_image = $(this).find("img").attr('src');

					if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
						$sidebar_img_container.fadeOut('fast', function() {
							$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
							$sidebar_img_container.fadeIn('fast');
						});
					}

					if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
						var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

						$full_page_background.fadeOut('fast', function() {
							$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
							$full_page_background.fadeIn('fast');
						});
					}

					if ($('.switch-sidebar-image input:checked').length == 0) {
						var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
						var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

						$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
						$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
					}

					if ($sidebar_responsive.length != 0) {
						$sidebar_responsive.css('background-image', 'url("' + new_image + '")');
					}
				});

				$('.switch-sidebar-image input').change(function() {
					$full_page_background = $('.full-page-background');

					$input = $(this);

					if ($input.is(':checked')) {
						if ($sidebar_img_container.length != 0) {
							$sidebar_img_container.fadeIn('fast');
							$sidebar.attr('data-image', '#');
						}

						if ($full_page_background.length != 0) {
							$full_page_background.fadeIn('fast');
							$full_page.attr('data-image', '#');
						}

						background_image = true;
					} else {
						if ($sidebar_img_container.length != 0) {
							$sidebar.removeAttr('data-image');
							$sidebar_img_container.fadeOut('fast');
						}

						if ($full_page_background.length != 0) {
							$full_page.removeAttr('data-image', '#');
							$full_page_background.fadeOut('fast');
						}

						background_image = false;
					}
				});

				$('.switch-sidebar-mini input').change(function() {
					$body = $('body');

					$input = $(this);

					if (md.misc.sidebar_mini_active == true) {
						$('body').removeClass('sidebar-mini');
						md.misc.sidebar_mini_active = false;

						$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

					} else {

						$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

						setTimeout(function() {
							$('body').addClass('sidebar-mini');

							md.misc.sidebar_mini_active = true;
						}, 300);
					}

					// we simulate the window Resize so the charts will get updated in realtime.
					var simulateWindowResize = setInterval(function() {
						window.dispatchEvent(new Event('resize'));
					}, 180);

					// we stop the simulation of Window Resize after the animations are completed
					setTimeout(function() {
						clearInterval(simulateWindowResize);
					}, 1000);

				});
			});
		});
	</script>
	@yield('scripts')
</body>

</html>