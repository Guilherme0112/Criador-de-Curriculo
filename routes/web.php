<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CurriculoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CurriculoController::class, 'index'])->name('index');

// Só deixa o usuário entrar no dashboard e perfil caso esteja autenticado

Route::get('/dashboard', [CurriculoController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/profile', [CurriculoController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

Route::get('/criar/{id}', [CurriculoController::class, 'criar'])
    ->where('id', '[0-9]+')
    ->middleware('auth')
    ->name('criar');

// Rota de logout

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rota para deletar usuarios

Route::delete('/delete-account', [AuthenticatedSessionController::class, 'destroyAccount'])->name('destroyAccount');

require __DIR__.'/auth.php';
