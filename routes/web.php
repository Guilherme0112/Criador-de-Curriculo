<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('index');


// Só deixa o usuário entrar no dashboard e perfil caso esteja autenticado

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
