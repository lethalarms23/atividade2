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
@if(auth()->check())
<a href="{{route('livros.create')}}" class="btn btn-secondary" role="button"><i class="fas fa-plus"></i></a>
@endif

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
  slidesToShow: 4,
  centerMode: true,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1500,
  infinite: true,
  });
});
</script>



<h2 style="text-align: center" class="bg-dark">Slider slick js</h2>
<div class="wrapper">
  <h2>Slick Carousel Example<h2>
<div class="carousel" style="height: 30%">
  <div><img src="https://konigwheels.com/wp-content/uploads/2018/07/IMG_4803-1024x597.jpg"></div>
  <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvUkGGTtSeFNUnJ8RYkUdRmHZKpthn_aQKjA&usqp=CAU"></div>
  <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIWbM6seMyysouiCXgyjZldIfjHHJCJt8m5g&usqp=CAU"></div>
  <div><img src="https://konigwheels.com/wp-content/uploads/2018/07/dkar-8615-1024x597.jpg"></div>
  <div><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRD0e0Fe3v7l3-cxkjweqEfYBflYdZVMbKsAw&usqp=CAU"></div>
  <div><img src="https://ccnwordpress.blob.core.windows.net/journal/2019/09/DSC07733.jpg"></div>
</div>
</div>
@endsection
