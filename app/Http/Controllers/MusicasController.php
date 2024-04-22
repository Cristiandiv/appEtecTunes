<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Musicas;
use Illuminate\Support\Facades\Storage;

class MusicasController extends Controller
{
    public function showHome(){
        return view('admin/adminhome');
    }


    public function showCadastroMusicas(Request $request){
        return view('admin/cadastroMusica');
    }

    // public function cadMusicas(Request $request){
    //     $dadosValidos = $request->validate([
    //         'image' => 'string|required',
    //         'nome' => 'string|required',
    //         'banda' => 'string|required',
    //         'genero' => 'string|required',
    //         'valor' => 'numeric|required'
    //     ]);

    //     Musicas::create($dadosValidos);

    //     return view('admin/adminhome');
    // }

    public function upload(Request $request)
    {
        // Validar os dados recebidos do formulário
        $dadosValidos = $request->validate([
            'image' => 'file|required', // Validar o campo de upload da imagem
            'nome' => 'string|required',
            'banda' => 'string|required',
            'genero' => 'string|required',
            'valor' => 'numeric|required',
            'musica' => 'file|required' // Validar o campo de upload da música
        ]);
    
        // Upload da imagem
        $imagemPath = $request->file('image')->store('public/imagens');
        $imagemUrl = Storage::url($imagemPath);
    
        // Upload da música
        $musicaPath = $request->file('musica')->store('public/musicas');
        $musicaUrl = Storage::url($musicaPath);
    
        // Salvar os dados no banco de dados
        Musicas::create([
            'image' => $imagemUrl,
            'nome' => $dadosValidos['nome'],
            'banda' => $dadosValidos['banda'],
            'genero' => $dadosValidos['genero'],
            'valor' => $dadosValidos['valor'],
            'musica' => $musicaUrl
        ]);
    
        // Redirecionar para a página desejada após o upload
        return redirect()->back()->with('success', 'Música adicionada com sucesso!');
    }


    //funcao para mostrar os dados gerenciados para nos
    public function mostrarGerenciarMusicaId(Musicas $id){

        return view('admin/formularioAlterarMusica',['registroMusicas' => $id]);
    }

    public function mostrarMusicas(Request $request){
        $dadosMusicas = Musicas::all();
        return view('mostrarMusicas',['registroMusicas' => $dadosMusicas]);
    }

    //funcao para gerenciar os dados
    public function gerenciarMusicas(Request $request){

        $dadosQuarto = Musicas::query();
        $dadosQuarto->when($request->numero,function($query,$valor){
            $query->where('numero','like','%'.$valor.'%');
        });
        $dadosQuarto = $dadosQuarto->get();

        return view('admin/gerenciarMusicas',['registroMusicas' => $dadosQuarto]);
    }

    //apagar dados salvos
    public function destroy(Musicas $id){
        
        $id->delete();
        return Redirect::route('home');
    }

    //alterar dados registrados do cliente
    public function alterarMusicasBanco(Musicas $id,Request $request){

        //o request e uma variavel que contem os dados cadastrados no formulario por post
        //ele ira validar se esses dados do validardados existe, so assim para eles serem salvos
        $dadosValidos = $request->validate([
            'nome' => 'string|required',
            'banda' => 'string|required',
            'genero' => 'string|required',
            'valor' => 'numeric|required',
        ]);

        //fill serve para organizar os dados recadastrados
        $id->fill($dadosValidos);
        //salvar dados 
        $id->save();

        return Redirect::route('home');

    }

}
