<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('titulo-pagina')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/vegas.css')}}">

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>
    <script src="{{asset('js/slick.js')}}"></script>
    <script src="{{asset('js/vegas.js')}}"></script>
    <style>
    body{
        background-color: #2b2b2b;
        color: #ffffff;
    }
    a{
        color: #ffffff;
    }
    table,tr,td,th{
      color: #ffffff;
      text-align: center;
    }
    th {
      text-decoration: underline;
    }
    .floatLeft { width: 50%; float: left; }
    .floatRight {width: 50%; float: right; }
    .container { overflow: hidden; }
    @yield('scripts')
    </style>
</head>
<body>
@if(session()->has('msg'))
  <h2 style="text-align: center" class="alert alert-danger">{{session('msg')}}</h2>
@endif

<h2 style="text-align: center" class="bg-dark">@yield('header')</h2>
    @yield('conteudo')
    <nav class="navbar navbar-expand-lg navbar bg-dark">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="{{route('home.index')}}"><i class="fas fa-home"></i></a>
      <a class="nav-item nav-link" href="{{route('pesquisa.index')}}"><i class="fas fa-search"></i></a>
      <a class="nav-item nav-link" href="{{route('livros.index')}}">Livros</a>
      <a class="nav-item nav-link" href="{{route('generos.index')}}">Generos</a>
      <a class="nav-item nav-link" href="{{route('editoras.index')}}">Editoras</a>
      <a class="nav-item nav-link" href="{{route('autores.index')}}">Autores</a>
    </div>
  </div>
</nav>
</body>
</html>