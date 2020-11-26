@extends('layout')
@section('header')
Generos
@endsection
@section('conteudo')
<div class="row">
@foreach($generos as $genero)
<div class="col-md-8">
<a href="{{route('genero.show',['id'=>$genero->id_genero])}}">
{{$genero->designacao}}
</a>
</div>
@endforeach
</div>
{{$generos->render()}}
<a href="{{route('generos.create')}}" class="btn btn-secondary" role="button"><i class="fas fa-plus"></i></a><br>
@endsection
