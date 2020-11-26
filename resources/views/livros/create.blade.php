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
<td><input type="text" name="titulo"></td>
</tr>
<tr>
<th>Idioma</th>
<td><input type="text" name="idioma"></td>
</tr>
<tr>
<th>Total Páginas</th>
<td><input type="text" name="total_paginas"></td>
</tr>
<tr>
<th>Data Edição</th>
<td><input type="text" name="data_edicao"></td>
</tr>
<tr>
<th>ISBN</th>
<td><input type="text" name="isbn"></td>
</tr>
<tr>
<th>Observações</th>
<td><input type="text" name="observacoes"></td>
</tr>
<tr>
<th>Imagem Capa</th>
<td><input type="text" name="imagem_capa"></td>
</tr>
<tr>
<th>Género</th>
<td><input type="text" name="id_genero"></td>
</tr>
<tr>
<th>Autor</th>
<td><input type="text" name="id_autor"></td>
</tr>
<tr>
<th>Sinopse</th>
<td><input type="text" name="sinopse"></td>
</tr>
<tr>
<td>Enviar Dados</td>
<td><input type="submit" value="Enviar" class="btn btn-light"></td>
</tr>
</table>
</form>
@endsection
