<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CadastrarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cadastrar', function () {
    return view('cadastrar');
})->middleware(['auth', 'verified'])->name('cadastrar');

Route::post('/cadastrar', [CadastrarController::class, 'salvar'])->middleware(['auth', 'verified'])->name('cadastrar');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
