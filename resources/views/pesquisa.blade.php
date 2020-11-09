@extends('layout')
@section('conteudo')
<form method="post" action="{{route('pesquisa.process')}}">
    @csrf
<label for="pesquisainput">Pesquisa:</label>
<input type="text" name="pesquisainput">
<button type="submit">Submeter</button>
</form>
@endsection