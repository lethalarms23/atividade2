@extends('layout')
@section('header')
Adicionar Livro
@endsection
@section('conteudo')
<form action="{{route('livros.store')}}" method="post">
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Título</th>
<td><input type="text" name="titulo" value="{{old('titulo')}}">*</td>
</tr>
<tr>
<th>Idioma</th>
<td><input type="text" name="idioma" value="{{old('idioma')}}">*</td>
</tr>
<tr>
<th>Total Páginas</th>
<td><input type="text" name="total_paginas" value="{{old('total_paginas')}}"></td>
</tr>
<tr>
<th>Data Edição</th>
<td><input type="date" name="data_edicao" value="{{old('data_edicao')}}"></td>
</tr>
<tr>
<th>ISBN</th>
<td><input type="text" name="isbn" value="{{old('isbn')}}">*</td>
</tr>
<tr>
<th>Observações</th>
<td><textarea name="observacoes">{{old('observacoes')}}</textarea>  </td>
</tr>
<tr>
<th>Imagem Capa</th>
<td><input type="text" name="imagem_capa" value="{{old('imagem_capa')}}"></td>
</tr>
<tr>
<th>Autor</th>
<td><input type="text" name="id_autor" value="{{old('id_autor')}}"></td>
</tr>
<tr>
<th>Sinopse</th>
<td><textarea name="sinopse">{{old('sinopse')}}</textarea></td>
</tr>
<tr>
<th>Genero</th>
<td>
<select name="id_genero">
@foreach($generos as $genero)
    <option value="{{$genero->id}}">{{$genero->designacao}}</option>
@endforeach
</select>
</td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@if($errors->has('titulo'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Titulo Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('idioma'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Idioma Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('total_paginas'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Total Paginas Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('data_edicao'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Data Edição Incorreta</td>
</tr>
</table>
@endif
@if($errors->has('isbn'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">ISBN Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('observacoes'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Observações Incorretas</td>
</tr>
</table>
@endif
@if($errors->has('imagem_capa'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Imagem Capa Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('id_genero'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Género Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('id_autor'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Autor Incorreto</td>
</tr>
</table>
@endif
@if($errors->has('sinopse'))
<table class="table table-dark table-striped">
<tr>
<td class="alert alert-danger">Sinopse Incorreta</td>
</tr>
</table>
@endif
@endsection
