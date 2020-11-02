@extends('layout')
@section('titulo-pagina')
Generos
@endsection
@section('conteudo')
<div class="row">
@foreach($generos as $genero)
<div class="col-md-8">
<a href="{{route('genero.show',['id'=>$genero->idg])}}">
{{$genero->designacao}}
</div>
@endforeach
</div>
{{$generos->render()}}
@endsection
