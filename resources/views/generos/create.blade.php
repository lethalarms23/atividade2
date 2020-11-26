@extends('layout')
@section('header')
Adicionar Genero
@endsection
@section('conteudo')
<form action="{{route('generos.store')}}" method="post">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Designação</th>
<td><input type="text" name="designacao" value="{{old('designacao')}}">*</td>
</tr>
<tr>
<th>Observações</th>
<td><input type="text" name="observacoes" value="{{old('observacoes')}}">*</td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@if($errors->has('designacao'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Designação Incorreto</td>
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
