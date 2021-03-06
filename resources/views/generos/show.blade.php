@extends('layout')
@section('header')
Generos
@endsection
@section('conteudo')
ID:{{$generos->id_genero}}<br>
Designação:{{$generos->designacao}}<br>
@if(count($generos->livros))
    @foreach($generos->livros as $livro)
        {{$livro->titulo}}<br>
    @endforeach
@else
    <div class="alert alert-danger" role="alert">
    Neste género ainda não há livros!
    </div>
@endif
Observações:{{$generos->observacoes}}<br>
@if(auth()->check() || Gate::allows('admin'))
<a href="{{route('genero.edit',['id'=>$generos->id_genero])}}" class="btn btn-secondary" role="button">Editar</a>
<a href="{{route('genero.delete',['id'=>$generos->id_genero])}}" class="btn btn-secondary" role="button"><i class="fas fa-minus"></i></a><br>
@endif
@endsection