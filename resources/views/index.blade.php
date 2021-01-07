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
@if(Gate::allows('admin'))
  <h2 style="text-align: center" class="bg-dark">Usuários Registrados</h2>
  <table class="table table-dark table-striped">
  <tr>
  <td>ID</td>
  <td>Nome</td>
  <td>Email</td>
  <td>Tipo:</td>
  </tr>
  <tr></tr>
  <tr>
  @foreach($users as $user)
    <tr>
    <td>{{$user->id}} </td>
    <td>{{$user->name}} </td>
    <td>{{$user->email}} </td>
    <td>{{$user->tipo_user}}</td>
    </tr>
  @endforeach
  </tr>
  </table>
@endif
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
<script src="https://raw.githubusercontent.com/jaysalvat/vegas/master/dist/vegas.min.js"></script>
@endsection