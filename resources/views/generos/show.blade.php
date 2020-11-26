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
Observações:{{$generos->observacoes}}
@endsection