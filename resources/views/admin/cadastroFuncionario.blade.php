@extends('admin/layoutAdmin')
@section('content')

<section class="container mt-5">

<form class="row g-3" method="POST" action="{{route('envia-banco-funcionario')}}">
@csrf
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Nome: </label>
    <input type="text" class="form-control" id="inputNome" name="nome">
  </div>

  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Função: </label>
    <input type="text" class="form-control" id="inputFuncao" name="funcao">
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>
</section>

@endsection()