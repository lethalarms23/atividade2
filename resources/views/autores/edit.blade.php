@extends('layout')
@section('header')
Adicionar Autor
@endsection
@section('conteudo')
@if(auth()->check() || Gate::allows('admin'))
<form action="{{route('autor.update',['id'=>$autor->id_autor])}}" method="post">
@method('patch')
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Nome</th>
<td><input type="text" name="nome" value="{{$autor->nome}}">*</td>
</tr>
<tr>
<th>Nacionalidade</th>
<td><input type="text" name="nacionalidade" value="{{$autor->nacionalidade}}">*</td>
</tr>
<tr>
<th>Data Nascimento</th>
<td><input type="date" name="data_nascimento" value="@if(!is_null($autor->data_nascimento)){{$autor->data_nascimento->format('Y-m-d')}}@endif"></td>
</tr>
<tr>
<th>Fotografia</th>
<td><input type="text" name="fotografia" value="{{$autor->fotografia}}"></td>
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
@endif
@endsection
