@extends('layout')
@section('header')
Livros
@endsection
@section('titulo-pagina')
Livros
@endsection
@section('conteudo')
<div class="row">
@foreach($livros as $livro)
<div class="col-md-8">
<a href="{{route('livros.show',['id'=>$livro->id_livro])}}">
{{$livro->titulo}}
</a>
</div>
@endforeach
</div>
{{$livros->render()}}
<a href="{{route('livros.create')}}" class="btn btn-secondary" role="button"><i class="fas fa-plus"></i></a>

<style>
.wrapper{
  width:100%;
  padding-top: 20px;
  text-align:center;
}
.carousel{
  width:90%;
  margin:0px auto;
}
.slick-slide{
  margin:10px;
}
.slick-slide img{
  width:100%;
  border: 2px solid #fff;
}
</style>



<script type="text/javascript">
   $(document).ready(function(){
  $('.carousel').slick({
  slidesToShow: 3,
  centerMode: true,
  });
});
</script>



<h2 style="text-align: center" class="bg-dark">Slider slick js</h2>
<div class="wrapper">
  <h2>Slick Carousel Example<h2>
<div class="carousel">
  <div><img src="http://lorempixel.com/200/200/nature/"></div>
  <div><img src="http://lorempixel.com/200/200/fashion/"></div>
  <div><img src="http://lorempixel.com/200/200/sports/"></div>
  <div><img src="http://lorempixel.com/200/200/animal/"></div>
  <div><img src="http://lorempixel.com/200/200/abstract/"></div>
  <div><img src="http://lorempixel.com/200/200/people/"></div>
</div>
</div>
@endsection
