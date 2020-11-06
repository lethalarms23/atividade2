@extends ('layout')
ID:{{$livro->id_livro}}<br>
Título:{{$livro->titulo}}<br>
Idioma:{{$livro->idioma}}<br>
@if(count($livro->autores))
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

@if(count($livro->editoras) > 0)
    @foreach($livro->editoras as $editora)
        Editora: {{$editora->nome}}<br>
    @endforeach
@else
<div class="alert alert-danger" role="alert">
    <h3>Sem Editora definida</h3>
    </div>
@endif
