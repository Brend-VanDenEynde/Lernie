<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsPostController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/nieuws', [NewsPostController::class, 'index'])->name('news.index');
Route::get('/nieuws/{newsPost}', [NewsPostController::class, 'show'])->name('news.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/attributen', function () {
    return view('attributen');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Users
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('users.show');

    // Articles (News)
    Route::get('/articles', [AdminController::class, 'articles'])->name('articles.index');
    Route::get('/articles/create', [AdminController::class, 'createArticle'])->name('articles.create');
    Route::post('/articles', [AdminController::class, 'storeArticle'])->name('articles.store');
    Route::get('/articles/{article}/edit', [AdminController::class, 'editArticle'])->name('articles.edit');
    Route::put('/articles/{article}', [AdminController::class, 'updateArticle'])->name('articles.update');
    Route::delete('/articles/{article}', [AdminController::class, 'destroyArticle'])->name('articles.destroy');

    // FAQ Categories
    Route::get('/faq/categories', [AdminController::class, 'faqCategories'])->name('faq.categories.index');
    Route::get('/faq/categories/create', [AdminController::class, 'createFaqCategory'])->name('faq.categories.create');
    Route::post('/faq/categories', [AdminController::class, 'storeFaqCategory'])->name('faq.categories.store');

    // FAQ
    Route::get('/faq', [AdminController::class, 'faq'])->name('faq.index');
    Route::get('/faq/create', [AdminController::class, 'createFaq'])->name('faq.create');
    Route::post('/faq', [AdminController::class, 'storeFaq'])->name('faq.store');
    Route::get('/faq/{faq}/edit', [AdminController::class, 'editFaq'])->name('faq.edit');
    Route::put('/faq/{faq}', [AdminController::class, 'updateFaq'])->name('faq.update');
    Route::delete('/faq/{faq}', [AdminController::class, 'destroyFaq'])->name('faq.destroy');
});

require __DIR__.'/auth.php';
