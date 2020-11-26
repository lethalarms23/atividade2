@extends('layout')
@section('header')
Editoras
@endsection
@section('conteudo')
<div class="row">
@foreach($editoras as $editora)
<div class="col-md-8">
<a href="{{route('editoras.show',['id'=>$editora->id_editora])}}">
{{$editora->nome}}
</a>
</div>
@endforeach
</div>
{{$editoras->render()}}
<a href="{{route('editoras.create')}}" class="btn btn-secondary" role="button"><i class="fas fa-plus"></i></a><br>
@endsection