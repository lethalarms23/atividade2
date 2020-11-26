@extends ('layout')
@section('header')
Livros
@endsection
@section('conteudo')
ID:{{$livro->id_livro}}<br>
Título:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>
ISBN: {{$livro->isbn}}<br>
@if(!is_null($livro->data_edicao))
Data Edição: {{$livro->data_edicao->format('d-m-Y')}}<br>
@else
<div class="alert alert-danger" role="alert">
    <h3>Sem Data definida</h3>
</div>
@endif
Total páginas: {{$livro->total_paginas}}<br>
Observações: {{$livro->observacoes}}<br>
Imagem Capa: {{$livro->imagem_capa}}<br>
Sinopse: {{$livro->sinopse}}<br>
Created_at: {{$livro->created_at}}<br>
Updated_at: {{$livro->updated_at}}<br>
Deleted_at: {{$livro->deleted_at}}<br>
@if(count($livro->autores)>0)
    @foreach($livro->autores as $autor)
        Nome: {{$autor->nome}}<br>
    @endforeach
@else
<div class="alert alert-danger" role="alert">
    <h3>Sem Autor definido</h3>
</div>
@endif

@if(isset($livro->genero->designacao))
    Designação:{{$livro->genero->designacao}}
@else
<div class="alert alert-danger" role="alert">
    <h3>Sem Género definido</h3>
</div> 
@endif
@endsection