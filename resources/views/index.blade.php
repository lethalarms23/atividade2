@extends ('layout')
@section('header')
Página Principal
@endsection
@section('conteudo')
<div class="multiple-items">
    <div>your content</div>
    <div>your content</div>
    <div>your content</div>
  </div>
@endsection
@section('scripts')
<script type="text/javascript">
    $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
    });
  </script>
@endsection