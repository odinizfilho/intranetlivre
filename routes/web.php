<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Intranet\Admin\AppsController;
use App\Http\Controllers\Intranet\Admin\BranchController;
use App\Http\Controllers\Intranet\Admin\CategoryController;
use App\Http\Controllers\Intranet\Admin\DashController;
use App\Http\Controllers\Intranet\Admin\IntranetConfigController;
use App\Http\Controllers\Intranet\BlogController;
use App\Http\Controllers\Intranet\DocManagerController;
use App\Http\Controllers\Intranet\SliderController;
use App\Http\Controllers\Intranet\ToolsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::fallback(function () {
    return view('errors.404');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/tools/signature', [ToolsController::class, 'signature'])->name('tools-signature');

    //gestor de documentos
    Route::get('/docmanagers', [DocManagerController::class, 'index'])->name('docmanagers.index');
    Route::get('/docmanagers/create', [DocManagerController::class, 'create'])->name('docmanagers.create');
    Route::post('/docmanagers', [DocManagerController::class, 'store'])->name('docmanagers.store');
    Route::get('/drive/download/{id}/{filename}', [DocManagerController::class, 'download'])->name('docmanager.download');
    Route::get('docmanager/view/{id}', [DocManagerController::class, 'show'])->name('docmanager.show');
    Route::get('/docmanagers/{category}', [DocManagerController::class, 'documentsByCategory'])
        ->name('documents.by.category');
    Route::get('/search', [DocManagerController::class, 'search'])->name('docmanager.search');

    // Rotas para listar, criar, armazenar, exibir, editar e atualizar categorias
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    // Rota para excluir uma categoria
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Rota para exibir a lista de posts
    Route::get('/posts', [BlogController::class, 'index'])->name('blog.index');
    // Rota para exibir um post específico
    Route::get('/posts/{post}', [BlogController::class, 'show'])->name('blog.show');
    // Rota para exibir o formulário de criação de post
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    // Rota para armazenar um novo post
    Route::post('/posts', [BlogController::class, 'store'])->name('blog.store');
    // Rota para exibir o formulário de edição de post
    Route::get('/posts/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    // Rota para atualizar um post existente
    Route::put('/posts/{post}', [BlogController::class, 'update'])->name('blog.update');
    // Rota para excluir um post
    Route::delete('/posts/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');

    // slider
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider/{sliderImage}', [SliderController::class, 'show'])->name('slider.show');
    Route::get('/slider/{sliderImage}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('/slider/{sliderImage}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('/slider/{sliderImage}', [SliderController::class, 'destroy'])->name('slider.destroy');
    //filial
    Route::get('/branches', [BranchController::class, 'index'])->name('branches.index');
    Route::get('/branches/create', [BranchController::class, 'create'])->name('branches.create');
    Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
    Route::get('/branches/{branch}', [BranchController::class, 'show'])->name('branches.show');
    Route::get('/branches/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');
    Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');
    Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');

});

Route::group(['middleware' => ['auth', 'admin']], function () {
    //admin-dash
    Route::get('/admin', [DashController::class, 'dash'])->name('admin');
    //admin
    Route::post('admin/apps', [AppsController::class, 'store'])->name('apps.store');
    Route::get('admin/apps/create', [AppsController::class, 'create'])->name('apps.create');

    //config
    Route::get('/admin/config', [IntranetConfigController::class, 'getConfig'])->name('config');
    Route::put('/admin/config/update', [IntranetConfigController::class, 'updateConfig'])->name('config.update');
});
