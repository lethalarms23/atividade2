@extends('layout')
@section('titulo-pagina')
Livros
@endsection
@section('conteudo')
<div class="row">
@foreach($livros as $livro)
<div class="col-md-8">
{{$livro->titulo}}
</div>
@endforeach
</div>
{{$livros->render()}}
@endsection
