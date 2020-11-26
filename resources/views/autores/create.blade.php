@extends('layout')
@section('header')
Adicionar Autor
@endsection
@section('conteudo')
<form action="{{route('autores.store')}}" method="post">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Nome</th>
<td><input type="text" name="nome" value="{{old('nome')}}">*</td>
</tr>
<tr>
<th>Nacionalidade</th>
<td><input type="text" name="nacionalidade" value="{{old('nacionalidade')}}">*</td>
</tr>
<tr>
<th>Data Nascimento</th>
<td><input type="date" name="data_nascimento" value="{{old('data_nascimento')}}"></td>
</tr>
<tr>
<th>Fotografia</th>
<td><input type="text" name="fotografia" value="{{old('fotografia')}}"></td>
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
@if($errors->has('nacionalidade'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Nacionalidade Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('data_nascimento'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Data Nascimento Incorreta</td>
</tr>
</table>
@endif
@if($errors->has('fotografia'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Fotografia Incorreta</td>
</tr>
</table>
@endif
@endsection
