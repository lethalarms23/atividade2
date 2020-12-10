<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>@yield('titulo-pagina')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vegas.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">

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
      <a class="nav-item nav-link" href="{{route('home')}}">Dashboard</a>
      @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
    </div>
  </div>
</nav>
@yield('scripts')
</body>
</html>