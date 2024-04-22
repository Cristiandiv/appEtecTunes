@extends('admin/layoutAdmin')
@section('content')

<section class="container mt-5">

<form class="row g-3" method="POST" action="{{route('alterar-usuario',$registroUsuarios ->id)}}">
@method('put')
@csrf
  <div class="col-md-12">
    <label for="inputName" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="inputName" value="{{old('name',$registroUsuarios->name)}}" name="name" placeholder="Paula da Silva">
  @error('name')
  <div class="text-sm-start text-light">*Preencher o campo Nome.</div>
  @enderror
    </div>

  <div class="col-md-12">
    <label for="inputEmail" class="form-label">E-mail:</label>
    <input type="email" class="form-control" id="inputEmail" value="{{old('email',$registroUsuarios->email)}}" name="email" placeholder="paulaaa@gmail.com">
  @error('email')
  <div class="text-sm-start text-light">*Preencher o campo Email.</div>
  @enderror
</div>

<div class="col-md-12">
    <label for="inputusertype" class="form-label">Tipo de Usuário:</label>
    <input type="text" class="form-control" id="inputusertype" value="{{old('usertype',$registroUsuarios->usertype)}}" name="usertype" placeholder="Admin ou User">
  @error('usertype')
  <div class="text-sm-start text-light">*Preencher o campo Tipo de Usuário.</div>
  @enderror
</div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Alterar</button>
  </div>
</form>
</section>

@endsection