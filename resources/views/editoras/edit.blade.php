@extends('layout')
@section('header')
Adicionar Editora
@endsection
@section('conteudo')
<form action="{{route('editora.update',['id'=>$editora->id_editora])}}" method="post">
@method('patch')
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Nome</th>
<td><input type="text" name="nome" value="{{$editora->nome}}">*</td>
</tr>
<tr>
<th>Morada</th>
<td><input type="text" name="morada" value="{{$editora->morada}}">*</td>
</tr>
<tr>
<th>Observações</th>
<td><input type="text" name="observacoes" value="{{$editora->observacoes}}"></td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@if($errors->has('nome'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Nome Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('morada'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Morada Incorreta</td>
</tr>
</table>
@endif
@if($errors->has('observacoes'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Observações Incorreto</td>
</tr>
</table>
@endif
@endsection
