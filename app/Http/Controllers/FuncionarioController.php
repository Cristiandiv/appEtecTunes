<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function showFormularioFuncionario(Request $request){
        return view('admin/cadastroFuncionario');
    }

    public function cadFuncionario(Request $request){
        $dadosValidos = $request->validate([
            'nome' => 'string|required',
            'funcao' => 'string|required'
        ]);

        Funcionario::create($dadosValidos);

        return Redirect::route('admin.adminhome');
    }
    

    //funcao para mostrar os dados gerenciados para nos
    public function mostrarGerenciarFuncionarioId(Funcionario $id){

        return view('admin/formularioAlterarFuncionario',['registroFuncionarios' => $id]);
    }

    //funcao para gerenciar os dados
    public function gerenciarFuncionario (Request $request){

        $dadosFunci = Funcionario::query();
        $dadosFunci->when($request->nome,function($query,$valor){
            $query->where('nome','like','%'.$valor.'%');
        });
        $dadosFunci = $dadosFunci->get();

        return view('admin/gerenciarFuncionario',['registroFuncionarios' => $dadosFunci]);
    }

    //apagar dados salvos
    public function destroy(Funcionario $id){
        
        $id->delete();
        return Redirect::route('admin.adminhome');
    }

    //alterar dados registrados do cliente
    public function alterarFuncionarioBanco(Funcionario $id,Request $request){

        //o request e uma variavel que contem os dados cadastrados no formulario por post
        //ele ira validar se esses dados do validardados existe, so assim para eles serem salvos
        $dadosValidos = $request->validate([
            'nome' => 'string|required',
            'funcao' => 'string|required'
        ]);

        //fill serve para organizar os dados recadastrados
        $id->fill($dadosValidos);
        //salvar dados 
        $id->save();

        return Redirect::route('admin.adminhome');
    }

}
