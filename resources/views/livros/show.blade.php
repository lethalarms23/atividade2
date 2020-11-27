@extends ('layout')
@section('header')
Livros
@endsection
@section('conteudo')
ID:{{$livro->id_livro}}<br>
Título:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}} <i class="{{strtolower($livro->idioma)}} flag"></i><br>
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
@if(!is_null($livro->created_at))
Created_at: {{$livro->created_at->format('d-m-Y')}}<br>
@else
<div class="alert alert-danger" role="alert">
    <h3>Created_at não definido</h3>
</div>
@endif
@if(!is_null($livro->updated_at))
Updated_at: {{$livro->updated_at->format('d-m-Y')}}<br>
@else
<div class="alert alert-danger" role="alert">
    <h3>Updated_at não definido</h3>
</div>
@endif
@if(!is_null($livro->deleted_at))
Deleted_at: {{$livro->deleted_at->format('d-m-Y')}}<br>
@else
<div class="alert alert-danger" role="alert">
    <h3>Deleted_at não definido</h3>
</div>
@endif
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
@endif<br>
<a href="{{route('livros.edit',['id'=>$livro->id_livro])}}" class="btn btn-secondary" role="button">Editar</a><br>
@endsection