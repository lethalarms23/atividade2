@extends('layout')
@section('header')
Adicionar Livro
@endsection
@section('conteudo')
<form action="{{route('genero.destroy',['id'=>$genero->id_genero])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$genero->id_genero}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Genero</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
