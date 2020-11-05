@extends('layout')
@section('titulo-pagina')
Editoras
@endsection
@section('conteudo')
<div class="row">
@foreach($editoras as $editora)
<div class="col-md-8">
{{$editoras->nome}}
</div>
@endforeach
</div>
{{$editoras->render()}}
@endsection