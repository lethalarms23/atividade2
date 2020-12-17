@extends('layout')
@section('header')
Editar Livro
@endsection
@section('conteudo')
@if(auth()->check())
@if(auth()->user()->name == $livro->users->name)
<form action="{{route('livros.update',['id'=>$livro->id_livro])}}" method="post">
@method('patch')
@csrf
<table class="table table-dark table-striped">
<tr>
<th>Título</th>
<td><input type="text" name="titulo" value="{{$livro->titulo}}">*</td>
</tr>
<tr>
<th>Idioma</th>
<td><input type="text" name="idioma" value="{{$livro->idioma}}">*</td>
</tr>
<tr>
<th>Total Páginas</th>
<td><input type="text" name="total_paginas" value="{{$livro->total_paginas}}"></td>
</tr>
<tr>
<th>Data Edição</th>
<td><input type="date" name="data_edicao" value="@if(!is_null($livro->data_edicao)){{$livro->data_edicao->format('Y-m-d')}}@endif"></td>
</tr>
<tr>
<th>ISBN</th>
<td><input type="text" name="isbn" value="{{$livro->isbn}}">*</td>
</tr>
<tr>
<th>Observações</th>
<td><textarea name="observacoes">{{$livro->observacoes}}</textarea></td>
</tr>
<tr>
<th>Imagem Capa</th>
<td><input type="text" name="imagem_capa" value="{{$livro->imagem_capa}}"></td>
</tr>
<tr>
<th>Género</th>
<td><select name="id_genero" class="custom-select custom-select-sm" style="width: 25%">
@foreach($generos as $genero)
    <option value="{{$genero->id_genero}}" @if($genero->id_genero==$livro->id_genero)selected @endif>{{$genero->designacao}}</option>
@endforeach
</select></td>
</tr>
<tr>
<th>Autor</th>
<td>
<select name="id_autor[]" class="custom-select custom-select-sm" style="width: 25%" multiple="multiple" size="3">
@foreach($autores as $autor)
    <option value="{{$autor->id_autor}}" @if (in_array($autor->id_autor, $autoresArray))selected @endif>{{$autor->nome}}</option>
@endforeach
</select>
</td>
</tr>
<tr>
<th>Editora</th>
<td>
<select name="id_editora[]" multiple="multiple">
        @foreach($editoras as $editora)
            <option value="{{$editora->id_editora}}" @if(in_array($editora->id_editora, $editorasArray))selected @endif>{{$editora->nome}}</option>
        @endforeach
    </select>
</td>
</tr>
<tr>
<th>Sinopse</th>
<td><textarea name="sinopse">{{$livro->sinopse}}</textarea></td>
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
@else
<div class="alert alert-danger" role="alert">
    <h3>Não têm permissão para editar este livro</h3>
</div> 
@endif
@endif
@endsection
