@extends ('layout')
@section('header')
Página Principal
@endsection
@section('conteudo')
<style>
.container{width:95%;max-width:970px;margin:auto;color:#fff}
body{}
.text-center{text-align:center}
.social_icons a {
  color: #F2FFFF;
  font-size: 29px;
  margin-right: 45px;
  background-color:#1abc9c;
  padding: 15px;
  border-radius: 29px;
  height: 29px;
  width: 29px;
}
.social_icons a:hover{background:#2ecc71}
.social_icons a i.fa-facebook {
  padding: 0 6px;
}
.name{}
.name h2 {
  font-family: 'Ubuntu', sans-serif;
  font-size: 80px;
  margin-top: 150px;
}
</style>

<script>
$('body').vegas({
  overlay: true,
  transition: 'fade', 
  transitionDuration: 4000,
  delay: 10000,
  animation: 'random',
  animationDuration: 20000,
  slides: [
    { src: 'https://www.drifted.com/wp-content/uploads/2014/02/MadMike_1920x1280.jpg' },
    { src: 'https://www.drifted.com/wp-content/uploads/2014/02/MadMike_1920x1280.jpg' },
    { src: 'https://www.drifted.com/wp-content/uploads/2014/02/MadMike_1920x1280.jpg'}
    
  ]
});
</script>

<h2 style="text-align: center" class="bg-dark">Slider Vegas js</h2>
<div class="container">
    <div class="name text-center">
        <h2>King Rayhan</h2> 
    </div>

    <div class="social_icons text-center">
        <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
        <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
        <a href="https://www.behance.net"><i class="fab fa-behance"></i></a>
        <a href="#"><i class="fab fa-flickr"></i></a>
    </div><br><br>
    

</div>
<script src="https://raw.githubusercontent.com/jaysalvat/vegas/master/dist/vegas.min.js"></script>
@endsection