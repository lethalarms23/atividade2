@extends ('layout')
ID:{{$livro->id_livro}}<br>
Título:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>
@if(isset($livro->autor->nome))
    Nome: {{$livro->autor->nome}}<br>
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
