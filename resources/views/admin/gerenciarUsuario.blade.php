@extends('admin/layoutAdmin')
@section('content')
<section class="container m-5">
  <div class="container m-5">
    <h1 class="text-center">Gerenciador de Usuários Cadastrados</h1>
    <form method='get' action="{{route('gerenciar-usuario')}}">
      <div class="row center">
        <div class="col">
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o Nome do Usuário" aria-label="Primeiro Nome">
        </div>
        <div class="col">
          <button type="submit" class="btn btn-info">Buscar</button>
        </div>
      </div>
    </form>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">E-mail</th>
        <th scope="col">Tipo do Usuário</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($registroUsuarios as $registroUsuariosLoop)
     
      <tr>
        <th scope="row">{{$registroUsuariosLoop->id}}</th>
        <td>{{$registroUsuariosLoop->name}}</td>
        <td>{{$registroUsuariosLoop->email}}</td>
        <td>{{$registroUsuariosLoop->usertype}}</td>
        <td>
          <a href="{{route('mostrar-usuario', $registroUsuariosLoop->id)}}">
            <button type="button" class="btn btn-primary">O</button>
          </a>
        </td>
        <td>

         <form method="post" action="{{route('apaga-usuario', $registroUsuariosLoop->id)}}">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-danger"> X </button>
         </form>

        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</section>

@endsection