<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cliente;
use App\Models\User;

class ClienteController extends Controller
{
    public function showHome(){
        return view('admin/adminhome');
    }

    //funcao para o formulario de cadastro do cliente
    public function showFormularioCadastro(Request $request){
        return view('admin/formularioCadastroCliente');
    }

    //funcao para resgate dos dados do formulario e envialos para o banco
    public function cadCliente(Request $request){

        $dadosValidos = $request->validate([
            'nome' => 'string|required',
            'email' => 'string|required',
            'fone' => 'string|required'
        ]);

        //o create e para inserir ou criar um novo dado
        Cliente::create($dadosValidos);

        return Redirect::route('admin.adminhome');
    }

    //funcao para mostrar os dados gerenciados para nos
    public function mostrarGerenciarClienteId (Cliente $id){

        return view('admin/formularioAlterarCliente',['registroClientes' => $id]);
    }

    //funcao para gerenciar os dados
    public function gerenciarCliente (Request $request){

        $dadosCliente = Cliente::query();
        $dadosCliente->when($request->nome,function($query,$valor){
            $query->where('nome','like','%'.$valor.'%');
        });
        $dadosCliente = $dadosCliente->get();

        return view('admin/gerenciarCliente',['registroClientes' => $dadosCliente]);
    }

    //apagar dados salvos
    public function destroy(Cliente $id){
        
        $id->delete();
        return Redirect::route('admin.adminhome');
    }

    //alterar dados registrados do cliente
    public function alterarClienteBanco(Cliente $id,Request $request){

        //o request e uma variavel que contem os dados cadastrados no formulario por post
        //ele ira validar se esses dados do validardados existe, so assim para eles serem salvos
        $dadosValidos = $request->validate([
            'nome' => 'string|required',
            'email' => 'string|required',
            'fone' => 'string|required'
        ]);

        //fill serve para organizar os dados recadastrados
        $id->fill($dadosValidos);
        //salvar dados 
        $id->save();
        return Redirect::route('admin.adminhome');
    }

    public function alterarUsuarioBanco(Cliente $id,Request $request){

        //o request e uma variavel que contem os dados cadastrados no formulario por post
        //ele ira validar se esses dados do validardados existe, so assim para eles serem salvos
        $dadosValidos = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'usertype' => 'string|required'
        ]);

        //fill serve para organizar os dados recadastrados
        $id->fill($dadosValidos);
        //salvar dados 
        $id->save();
        return Redirect::route('adminhome');
    }

    public function mostrarGerenciarUsuarioId (User $id){

        return view('admin/formularioAlterarUsuario',['registroUsuarios' => $id]);
    }

    //funcao para gerenciar os dados
    public function gerenciarUsuario (Request $request){

        $dadosUsuario = User::query();
        $dadosUsuario->when($request->nome,function($query,$valor){
            $query->where('name','like','%'.$valor.'%');
        });
        $dadosUsuario = $dadosUsuario->get();

        return view('admin/gerenciarUsuario',['registroUsuarios' => $dadosUsuario]);
    }

    //apagar dados salvos
    public function destroyUser (User $id){
        
        $id->delete();
        return Redirect::route('adminhome');
    }
}
