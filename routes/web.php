<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\UnidadeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');



    
    // Rota para exibir a lista de unidades
    Route::get('/unidades', [UnidadeController::class, 'index'])->name('unidades.index');
    
    // Rota para exibir o formulário de criação de uma nova unidade
    Route::get('/unidades/create', [UnidadeController::class, 'create'])->name('unidades.create');
    
    // Rota para salvar uma nova unidade no banco de dados
    Route::post('/unidades', [UnidadeController::class, 'store'])->name('unidades.store');
    
    // Rota para exibir os detalhes de uma unidade específica
    Route::get('/unidades/{id}', [UnidadeController::class, 'show'])->name('unidades.show');
    
    // Rota para exibir o formulário de edição de uma unidade existente
    Route::get('/unidades/{id}/edit', [UnidadeController::class, 'edit'])->name('unidades.edit');
    
    // Rota para atualizar uma unidade no banco de dados
    Route::put('/unidades/{id}', [UnidadeController::class, 'update'])->name('unidades.update');
    
    // Rota para excluir uma unidade do banco de dados
    Route::delete('/unidades/{id}', [UnidadeController::class, 'destroy'])->name('unidades.destroy');
    

// Listar todos os colaboradores
Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores.index');

// Exibir formulário de criação de um novo colaborador
Route::get('/colaboradores/create', [ColaboradorController::class, 'create'])->name('colaboradores.create');



// Exibir detalhes de um colaborador específico
Route::get('/colaboradores/{colaborador}', [ColaboradorController::class, 'show'])->name('colaboradores.show');



// Armazenar um novo colaborador no banco de dados
Route::post('/colaboradores', [ColaboradorController::class, 'store'])->name('colaboradores.store');

// Exibir formulário de edição de um colaborador existente
Route::get('/colaboradores/{colaborador}/edit', [ColaboradorController::class, 'edit'])->name('colaboradores.edit');

// Atualizar um colaborador no banco de dados
Route::put('/colaboradores/{colaborador}', [ColaboradorController::class, 'update'])->name('colaboradores.update');

// Exibir formulário de confirmação para excluir um colaborador
Route::get('/colaboradores/{colaborador}/delete', [ColaboradorController::class, 'delete'])->name('colaboradores.delete');

// Excluir um colaborador do banco de dados
Route::delete('/colaboradores/{colaborador}', [ColaboradorController::class, 'destroy'])->name('colaboradores.destroy');

});

 // Rotas Livres
 Route::get('/i', function () {
    return view('intralivre.home');
});

Route::fallback(function () {
    return view('errors.404');
   });
