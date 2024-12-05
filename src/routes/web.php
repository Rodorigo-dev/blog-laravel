<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



//rotas publicas
Route::get('/', [PostController::class, 'index'])->name('posts.index'); //pagina inicial do post
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show'); // Exibir um post específico
Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard'); // Dashboard público para visitantes e logados

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[PostController::class, 'index']
     
    )->name('dashboard');

    //rotas administrativas para posts
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});
