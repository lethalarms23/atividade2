@extends('layout')
@section('header')
Adicionar Livro
@endsection
@section('conteudo')
<form action="{{route('autor.destroy',['id'=>$autor->id_autor])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$autor->id_autor}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Autores</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
