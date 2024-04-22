@extends('admin/layoutAdmin')
@section('content')

<section class="container mt-5">

<form class="row g-3" method="POST" action="{{ route('alterar-musicas', $registroMusicas->id) }}">
@method('PUT')
@csrf

  <div class="col-md-12">
    <label for="inputNome" class="form-label">Nome: </label>
    <input type="text" class="form-control" id="inputNome" value="{{ old('nome', $registroMusicas->nome) }}" name="nome">
    @error('nome')
      <div class="text-sm-start text-light">* {{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-12">
    <label for="inputBanda" class="form-label">Banda: </label>
    <input type="text" class="form-control" id="inputBanda" value="{{ old('banda', $registroMusicas->banda) }}" name="banda">
    @error('banda')
      <div class="text-sm-start text-light">* {{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-12">
    <label for="inputGenero" class="form-label">Gênero: </label>
    <input type="text" class="form-control" id="inputGenero" value="{{ old('genero', $registroMusicas->genero) }}" name="genero">
    @error('genero')
      <div class="text-sm-start text-light">* {{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-12">
    <label for="inputValor" class="form-label">Valor: </label>
    <input type="text" class="form-control" id="inputValor" value="{{ old('valor', $registroMusicas->valor) }}" name="valor">
    @error('valor')
      <div class="text-sm-start text-light">* {{ $message }}</div>
    @enderror
  </div>
  
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Alterar</button>
  </div>
</form>
</section>

@endsection