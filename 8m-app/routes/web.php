<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\MemeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\LoginController;


// Ruta pública
Route::get('/', [MemeController::class, 'index']);

// TODO: Aquí irán las rutas de autenticación (register, login, logout)
// Seguir GUIA_AUTH_CLASE.md paso 3

// Rutas de memes (sin protección todavía)
// TODO: Proteger estas rutas con middleware 'auth' (ver guía paso 5)
// Rutas de memes protegidas
Route::middleware('auth')->group(function () {
    Route::post('/memes', [MemeController::class, 'store']);
    Route::get('/memes/{meme}/edit', [MemeController::class, 'edit']);
    Route::put('/memes/{meme}', [MemeController::class, 'update']);
    Route::delete('/memes/{meme}', [MemeController::class, 'destroy']);
});


// Chirps routes (still available)
Route::get('/chirps', [ChirpController::class, 'index']);
Route::post('/chirps/store', [ChirpController::class, 'store']);

// Registro
Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

// Login
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->middleware('auth');


