<ul>
@foreach($autores as $autor)
<li>{{$autores->nome}}</li>
@endforeach
</ul>
{{$autores->render()}}