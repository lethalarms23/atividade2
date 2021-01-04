@extends('layout')
@section('header')
Editoras
@endsection
@section('conteudo')
ID:{{$editoras->id_editora}}<br>
Nome:{{$editoras->nome}}<br>
Observações:{{$editoras->observacoes}}<br>
Morada: {{$editoras->morada}}<br>
@if(auth()->check() || Gate::allows('admin'))
<a href="{{route('editora.edit',['id'=>$editoras->id_editora])}}" class="btn btn-secondary" role="button">Editar</a>
<a href="{{route('editora.delete',['id'=>$editoras->id_editora])}}" class="btn btn-secondary" role="button"><i class="fas fa-minus"></i></a><br>
@endif
@endsection