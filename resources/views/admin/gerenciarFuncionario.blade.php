@extends('admin/layoutAdmin')
@section('content')
<section class="container m-5">
  <div class="container m-5">
    <h1 class="text-center">Gerenciador de Dados de Funcionário</h1>
    <form method='get' action="{{route('gerenciar-funcionario')}}">
      <div class="row center">
        <div class="col">
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o Nome do Funcionário" aria-label="Primeiro Nome">
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
        <th scope="col">Função</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
    
    @foreach($registroFuncionarios as $registroFunciLoop)

      <tr>
      <th scope="row">{{$registroFunciLoop->id}}</th>
        <td>{{$registroFunciLoop->nome}}</td>
        <td>{{$registroFunciLoop->funcao}}</td>
        <td>
          <a href="{{route('mostrar-funcionario', $registroFunciLoop->id)}}">
            <button type="button" class="btn btn-primary">O</button>
          </a>
        </td>
        <td>
        <form method="post" action="{{route('apaga-funcionario', $registroFunciLoop->id)}}">
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