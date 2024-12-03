<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UsuarioController::class, 'login'])->name('login');

Route::post('login', [UsuarioController::class, 'login']);

Route::get('logout', [UsuarioController::class, 'logout'])->name('logout');