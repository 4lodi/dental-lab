@extends('layout.main')

@section('content')

@guest
  <p><b>para ver el contenido <a href="/login">inicia sesion</a></b></p>
@endguest

    @auth
         <h1>Hola Mundo autentiuficado</h1>


         
    @endauth

@endsection