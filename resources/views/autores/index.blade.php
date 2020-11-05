@extends('layout')
@section('titulo-pagina')
Autores
@endsection
@section('conteudo')
<div class="row">
@foreach($autores as $autor)
<div class="col-md-8">
{{$autores->nome}}
</div>
@endforeach
</div>
{{$autores->render()}}
@endsection
