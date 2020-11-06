@extends('layout')
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