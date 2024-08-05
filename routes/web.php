<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');

// Só deixa o usuário entrar no dashboard e perfil caso esteja autenticado

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('criar', 'criar')
    ->middleware(['auth', 'verified'])
    ->name('criar');

// Rota de logout

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rota para deletar usuarios

Route::delete('/delete-account', [AuthenticatedSessionController::class, 'destroyAccount'])->name('destroyAccount');

require __DIR__.'/auth.php';
