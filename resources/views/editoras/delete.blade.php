@extends('layout')
@section('header')
Adicionar Livro
@endsection
@section('conteudo')
<form action="{{route('editora.destroy',['id'=>$editora->id_editora])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$editora->id_editora}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Editora</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
