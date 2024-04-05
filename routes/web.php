<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Intranet\Admin\AppsController;
use App\Http\Controllers\Intranet\Admin\DashController;
use App\Http\Controllers\Intranet\ToolsController;

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
    Route::get('tools/signature', [ToolsController::class, 'signature'])->name('tools-signature');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    //admin-dash
    Route::get('/admin', [DashController::class, 'dash'])->name('admin');
    //admin
    Route::post('admin/apps', [AppsController::class, 'store'])->name('apps.store');
    Route::get('admin/apps/create', [AppsController::class, 'create'])->name('apps.create');
});
