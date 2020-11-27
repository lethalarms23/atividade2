@extends('layout')
@section('header')
Editoras
@endsection
@section('conteudo')
ID:{{$editoras->id_editora}}<br>
Nome:{{$editoras->nome}}<br>
Observações:{{$editoras->observacoes}}<br>
Morada: {{$editoras->morada}}<br>
<a href="{{route('editora.edit',['id'=>$editoras->id_editora])}}" class="btn btn-secondary" role="button">Editar</a><br>
@endsection