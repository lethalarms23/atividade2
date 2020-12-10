@extends('layout')
@section('header')
Autores
@endsection
@section('conteudo')
<div class="row">
@foreach($autores as $autor)
<div class="col-md-8">
<a href="{{route('autores.show',['id'=>$autor->id_autor])}}">{{$autor->nome}}</a>
</div>
@endforeach
</div>
{{$autores->render()}}
@if(auth()->check())
<a href="{{route('autores.create')}}" class="btn btn-secondary" role="button"><i class="fas fa-plus"></i></a><br>
@endif
@endsection
