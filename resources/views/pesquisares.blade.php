@extends('layout')
<h1 style="text-align:center">Resultado da pesquisa para: {{$texto}}</h1>
@foreach($resultado as $res)
<a href="{{route('livros.show',['id'=>$res->id_livro])}}">
    {{$res->titulo}}
</a>
    <br>
@endforeach