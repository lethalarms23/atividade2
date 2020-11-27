@extends('layout')
@section('header')
Autores
@endsection
@section('conteudo')
ID:{{$autores->id_autor}}<br>
Nome:{{$autores->nome}}<br>
Nacionalidade: {{$autores->nacionalidade}}<br>
Data Nascimento: {{$autores->data_nascimento}}<br>
Fotografia: {{$autores->fotografia}}<br>
@if(count($autores->livros))
    @foreach($autores->livros as $livro)
        Livros deste autor: {{$livro->titulo}}<br>
    @endforeach
@else
    <div class="alert alert-danger" role="alert">
    <h3>Este autor ainda não têm livros</h3>
    </div> 
@endif
<br>
<a href="{{route('autor.edit',['id'=>$autores->id_autor])}}" class="btn btn-secondary" role="button">Editar</a><br>
@endsection