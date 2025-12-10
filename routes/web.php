<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsPostController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/nieuws', [NewsPostController::class, 'index'])->name('news.index');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/attributen', function () {
    return view('attributen');
});

require __DIR__.'/auth.php';
