<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('index');
});

route::get('/home', [HomeController::class,'index'])->middleware('auth')->name('home');

route::get('post', [HomeController::class, 'post'])->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/admin-home', [ClienteController::class,'showHome'])->name('showAdmin-home');

Route::view('/admin/adminhome', 'admin.adminhome')->name('admin.adminhome');



Route::get('/cadastro-cliente', [ClienteController::class,'showFormularioCadastro'])->name('showFormulario-cadastro');
Route::post('/cadastro-cliente',[ClienteController::class,'cadCliente'])->name('envia-banco-cliente');
Route::get('/gerenciar-cliente',[ClienteController::class,'gerenciarCliente'])->name('gerenciar-cliente');
Route::get('/alterar-cliente/{id}',[ClienteController::class,'mostrarGerenciarClienteId'])->name('mostrar-cliente');
Route::put('/altera-cliente/{id}',[ClienteController::class,'alterarClienteBanco'])->name('alterar-cliente');
Route::delete('/apaga-cliente/{id}',[ClienteController::class,'destroy'])->name('apaga-cliente');

///////////////////////

Route::get('/gerenciar-usuario',[ClienteController::class,'gerenciarUsuario'])->name('gerenciar-usuario');
Route::get('/alterar-usuario/{id}',[ClienteController::class,'mostrarGerenciarUsuarioId'])->name('mostrar-usuario');
Route::put('/altera-usuario/{id}',[ClienteController::class,'alterarUsuarioBanco'])->name('alterar-usuario');
Route::delete('/apaga-usuario/{id}',[ClienteController::class,'destroyUser'])->name('apaga-usuario');

///////////////////////

Route::get('/cadastro-funcionario', [FuncionarioController::class,'showFormularioFuncionario'])->name('show-Formulario-funcionario');
Route::post('/cadastro-funcionario',[FuncionarioController::class,'cadFuncionario'])->name('envia-banco-funcionario');
Route::get('/gerenciarFuncionario',[FuncionarioController::class,'gerenciarFuncionario'])->name('gerenciar-funcionario');
Route::get('/alterar-funcionario/{id}',[FuncionarioController::class,'mostrarGerenciarFuncionarioId'])->name('mostrar-funcionario');
Route::put('/altera-funcionario/{id}',[FuncionarioController::class,'alterarFuncionarioBanco'])->name('alterar-funcionario');
Route::delete('/apaga-funcionario/{id}',[FuncionarioController::class,'destroy'])->name('apaga-funcionario');

///////////////////////
Route::get('/cadastrar-musicas',[MusicasController::class,'showCadastroMusicas'])->name('show-cadastro-musicas');
Route::post('/envia-banco-musica', 'App\Http\Controllers\MusicasController@upload')->name('envia-banco-musica');
Route::get('/gerenciarMusicas',[MusicasController::class,'gerenciarMusicas'])->name('gerenciar-musicas');
Route::get('/ver-musicas',[MusicasController::class,'mostrarMusicas'])->name('ver-musicas');
Route::get('/alterar-musicas/{id}',[MusicasController::class,'mostrarGerenciarMusicaId'])->name('mostrar-musicas');
Route::put('/altera-musicas/{id}',[MusicasController::class,'alterarMusicasBanco'])->name('alterar-musicas');
Route::delete('/apaga-musicas/{id}',[MusicasController::class,'destroy'])->name('apaga-musicas');



});

require __DIR__.'/auth.php';
