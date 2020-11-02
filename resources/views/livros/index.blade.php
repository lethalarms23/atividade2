@extends('layout')
@section('titulo-pagina')
Livros
@endsection
@section('conteudo')
<div class="row">
@foreach($livros as $livro)
<div class="col-md-8">
<a href="{{route('livros.show',['id'=>$livro->idl])}}">
{{$livro->titulo}}
</a>
</div>
@endforeach
</div>
{{$livros->render()}}
@endsection
