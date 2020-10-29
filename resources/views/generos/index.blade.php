@extends('layout')
@section('titulo-pagina')
Generos
@endsection
@section('conteudo')
<div class="row">
@foreach($generos as $genero)
<div class="col-md-8">
{{$genero->designacao}}
</div>
@endforeach
</div>
{{$generos->render()}}
@endsection
