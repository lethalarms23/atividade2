@extends('layout')
@section('header')
Adicionar Livro
@endsection
@section('conteudo')
<form action="{{route('livros.destroy',['id'=>$livro->id_livro])}}" method="post">
@csrf
@method('delete')
<input type="hidden" value="{{$livro->id_livro}}">
<table class="table table-dark table-striped">
<tr>
<td>Eliminar Livro</td>
<td><input type="submit" value="Eliminar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
