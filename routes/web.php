<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsPostController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Public profile - toegankelijk voor iedereen
Route::get('/profiel/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user && $user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    if ($user && $user->role === 'tutor') {
        return redirect()->route('tutor.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/subjects', [ProfileController::class, 'updateSubjects'])->name('profile.subjects.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Les management voor tutors
    Route::get('/lessen', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/lessen/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/lessen', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/lessen/{lesson}', [LessonController::class, 'show'])->name('lessons.show');
    Route::get('/lessen/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/lessen/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/lessen/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
});

// Student routes
Route::middleware(['auth', 'verified'])->prefix('student')->name('student.')->group(function () {
    Route::get('/lessen', [StudentController::class, 'lessons'])->name('lessons.index');
    Route::get('/lessen/{lesson}', [StudentController::class, 'showLesson'])->name('lessons.show');
    Route::post('/lessen/{lesson}/enroll', [StudentController::class, 'enroll'])->name('lessons.enroll');
    Route::delete('/lessen/{lesson}/enroll', [StudentController::class, 'unenroll'])->name('lessons.unenroll');
    Route::get('/inschrijvingen', [StudentController::class, 'myEnrollments'])->name('enrollments.index');
});

Route::get('/nieuws', [NewsPostController::class, 'index'])->name('news.index');
Route::get('/nieuws/{newsPost}', [NewsPostController::class, 'show'])->name('news.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

// Contact routes - accessible to everyone
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/attributen', function () {
    return view('attributen');
});

Route::middleware(['auth', 'verified'])->prefix('tutor')->name('tutor.')->group(function () {
    Route::get('/', function () {
        return view('tutor.dashboard');
    })->name('dashboard');
    
    // Subject management
    Route::get('/subjects/create', function () {
        return view('tutor.subjects.create');
    })->name('subjects.create');

    Route::post('/subjects', function (\Illuminate\Http\Request $request) {
        $user = Auth::user();
        $subjectIds = $request->input('subject_ids', []);
        
        // Detach all current subjects
        $user->subjects()->detach();
        
        // Attach selected subjects
        if (!empty($subjectIds)) {
            $user->subjects()->attach($subjectIds);
        }
        
        return redirect()->route('tutor.dashboard')->with('success', 'Onderwerpen bijgewerkt.');
    })->name('subjects.store');

    Route::delete('/subjects/{subject}', function (\App\Models\Subject $subject) {
        Auth::user()->subjects()->detach($subject->id);
        return redirect()->route('tutor.dashboard')->with('success', 'Onderwerp verwijderd.');
    })->name('subjects.detach');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Users
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/{user}', [AdminController::class, 'showUser'])->name('users.show');
    Route::post('/users/{user}/promote', [AdminController::class, 'promoteToAdmin'])->name('users.promote');
    Route::post('/users/{user}/demote', [AdminController::class, 'demoteFromAdmin'])->name('users.demote');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.destroy');

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

    // Contacts
    Route::get('/contacts', [AdminController::class, 'contacts'])->name('contacts.index');
    Route::get('/contacts/{contact}', [AdminController::class, 'showContact'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [AdminController::class, 'destroyContact'])->name('contacts.destroy');
});

require __DIR__.'/auth.php';
