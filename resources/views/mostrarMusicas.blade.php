@extends('layout')
@section('content')
<section class="container m-5">

  
<div class="container">
  <div class="row">
    @foreach($registroMusicas as $registroMusicasLoop)
      <div class="col-md-4 mb-4">
        <div class="card">
          <img src="{{$registroMusicasLoop->image}}" class="card-img-top" alt="Capa do Álbum">
          <div class="card-body">
            <h5 class="card-title text-center fw-bolder">{{$registroMusicasLoop->nome}}</h5>
            <p class="card-text">Banda: &nbsp;{{$registroMusicasLoop->banda}}</p>
            <p class="card-text">Gênero: &nbsp;{{$registroMusicasLoop->genero}}</p>
            <p class="card-text">Valor: &nbsp;{{$registroMusicasLoop->valor}}</p>
            <audio controls>
              <source src="{{$registroMusicasLoop->musica}}" type="audio/mp3">
            </audio>
            <a href="{{$registroMusicasLoop->musica}}" download class="btn btn-primary mt-3">Baixar Ilegalmente</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>


</section>

@endsection