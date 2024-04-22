@extends('layout')
@section('content')

<!-- <img style ="width: 100%" src="assets/fotoprincipal.jpg"/> -->

<div class="container" >


  <div class="row align-self-center">
    

    <div class="card text-center">
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <h5 class="card-title">Bem-Vindo ao Universo Musical</h5>
                <p class="card-text">Seja bem-vindo à nossa plataforma dedicada à música, um espaço onde os sons se tornam histórias e as notas são a linguagem universal. Aqui, você vai se encantar com uma variedade de melodias que transcendem o tempo e as fronteiras.</p>
                <p class="card-text">Em nosso site, você terá acesso a uma coleção cuidadosamente selecionada de músicas, cada uma contendo sua própria magia e mistério. Você pode explorar livremente, permitindo que as melodias guiem sua jornada através de paisagens sonoras únicas.</p>
                <p class="card-text">Saiba que aqui nos concentramos na experiência musical pura. Você terá acesso apenas ao nome da música, ao tempo de execução e ao nome do autor. Deixe-se levar pela música e permita que ela fale por si mesma, sem influências externas.</p>
                <p class="card-text">Preparamos este espaço como um refúgio para os amantes da música, onde você pode se perder nas melodias e encontrar inspiração em cada acorde. Seja bem-vindo ao nosso universo musical, onde as palavras são substituídas pelo som e onde cada nota conta uma história única.</p>
                <a href="{{route('ver-musicas')}}" class="btn btn-primary">Explorar Musicas</a>
            </div>
            <div class="card-footer text-muted">
            </div>
            </div>

    </div>
  </div>


  
</div>

@endsection()