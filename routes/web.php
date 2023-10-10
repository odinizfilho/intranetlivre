<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\DSalaController;
use App\Http\Controllers\FatoReservaController;

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
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::match(['get', 'post'], '/dashboard', [BlogController::class, 'dashboard'])->name('dashboard');





    // Rota para exibir a lista de slides (index)
    Route::get('/slides', [SlideController::class, 'index'])->name('slides.index');

    // Rota para exibir o formulário de criação de slide (create)
    Route::get('/slides/create', [SlideController::class, 'create'])->name('slides.create');

    // Rota para armazenar um novo slide (store)
    Route::post('/slides', [SlideController::class, 'store'])->name('slides.store');

    // Rota para exibir os detalhes de um slide específico (show)
    Route::get('/slides/{slide}', [SlideController::class, 'show'])->name('slides.show');

    // Rota para exibir o formulário de edição de um slide (edit)
    Route::get('/slides/{slide}/edit', [SlideController::class, 'edit'])->name('slides.edit');

    // Rota para atualizar um slide específico (update)
    Route::put('/slides/{slide}', [SlideController::class, 'update'])->name('slides.update');

    // Rota para excluir um slide específico (destroy)
    Route::delete('/slides/{slide}', [SlideController::class, 'destroy'])->name('slides.destroy');


    // Rota para exibir a lista de cargos
    Route::get('/cargos', [CargoController::class, 'index'])->name('cargos.index');

    // Rota para exibir o formulário de criação de um novo cargo
    Route::get('/cargos/create', [CargoController::class, 'create'])->name('cargos.create');

    // Rota para salvar um novo cargo no banco de dados
    Route::post('/cargos', [CargoController::class, 'store'])->name('cargos.store');

    // Rota para exibir os detalhes de um cargo específico
    Route::get('/cargos/{id}', [CargoController::class, 'show'])->name('cargos.show');

    // Rota para exibir o formulário de edição de um cargo existente
    Route::get('/cargos/{id}/edit', [CargoController::class, 'edit'])->name('cargos.edit');

    // Rota para atualizar um cargo no banco de dados
    Route::put('/cargos/{id}', [CargoController::class, 'update'])->name('cargos.update');

    // Rota para excluir um cargo do banco de dados
    Route::delete('/cargos/{id}', [CargoController::class, 'destroy'])->name('cargos.destroy');


    // Rota para exibir a lista de setor
    Route::get('/setor', [SetorController::class, 'index'])->name('setor.index');

    // Rota para exibir o formulário de criação de um novo cargo
    Route::get('/setor/create', [SetorController::class, 'create'])->name('setor.create');

    // Rota para salvar um novo cargo no banco de dados
    Route::post('/setor', [SetorController::class, 'store'])->name('setor.store');

    // Rota para exibir os detalhes de um cargo específico
    Route::get('/setor/{id}', [SetorController::class, 'show'])->name('setor.show');

    // Rota para exibir o formulário de edição de um cargo existente
    Route::get('/setor/{id}/edit', [SetorController::class, 'edit'])->name('setor.edit');

    // Rota para atualizar um cargo no banco de dados
    Route::put('/setor/{id}', [SetorController::class, 'update'])->name('setor.update');

    // Rota para excluir um cargo do banco de dados
    Route::delete('/setor/{id}', [SetorController::class, 'destroy'])->name('setor.destroy');


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

    // importadores

    // Rota para exibir o formulário de importação de CSV
    Route::get('/import/unidades', [UnidadeController::class, 'import'])->name('unidades.import');

    // Rota para processar o envio do arquivo CSV
    Route::post('/import/unidades', [UnidadeController::class, 'importcsv'])->name('unidades.importcsv');

    Route::get('/import/unidades-csv', [UnidadeController::class, 'generateexemplocsv'])->name('unidades.exemplo-csv');


    // Listar todos os colaboradores
    Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores.index');

    Route::get('/aniversariantes', [ColaboradorController::class, 'aniversariantes'])->name('colaboradores.aniversariantes');

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

    // Rotas para categorias
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    //blog
    Route::get('/posts', [BlogController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [BlogController::class, 'create'])->name('posts.create');
    Route::post('/posts', [BlogController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [BlogController::class, 'show'])->name('posts.show');
    Route::get('/posts/{id}/edit', [BlogController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [BlogController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [BlogController::class, 'destroy'])->name('posts.destroy');

    // Rotas para DSalaController
    Route::get('/salas', [DSalaController::class, 'index'])->name('salas.index');
    Route::get('/salas/create', [DSalaController::class, 'create'])->name('salas.create');
    Route::post('/salas', [DSalaController::class, 'store'])->name('salas.store');
    Route::get('/salas/{sala}', [DSalaController::class, 'show'])->name('salas.show');
    Route::get('/salas/{sala}/edit', [DSalaController::class, 'edit'])->name('salas.edit');
    Route::put('/salas/{sala}', [DSalaController::class, 'update'])->name('salas.update');
    Route::delete('/salas/{sala}', [DSalaController::class, 'destroy'])->name('salas.destroy');

    // Rotas para FatoReservaController
    Route::get('/reservas', [FatoReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/create', [FatoReservaController::class, 'create'])->name('reservas.create');
    Route::post('/reservas', [FatoReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/{reserva}', [FatoReservaController::class, 'show'])->name('reservas.show');
    Route::get('/reservas/{reserva}/edit', [FatoReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('/reservas/{reserva}', [FatoReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/reservas/{reserva}', [FatoReservaController::class, 'destroy'])->name('reservas.destroy');

    Route::get('/app/reservas.json', [FatoReservaController::class, 'getReservedDatesAndTimes'])
    ->name('reservas.dates-and-times-reserved');
    

});

// Rotas Livres
Route::get('/i', function () {
    return view('intralivre.home');
});

Route::fallback(function () {
    return view('errors.404');
});