<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\IssuedBookController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\BookController as StudentBookController;
use App\Http\Controllers\Student\IssuedBookController as StudentIssuedBookController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;

Route::get('/', function () {
    return view('auth.admin.login');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::resource('students', StudentController::class);
    Route::resource('issued-books', IssuedBookController::class);
    Route::post('issued-books/return/{id}', [IssuedBookController::class, 'returnBook'])
         ->name('issued-books.return');


    
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('books', BookController::class);
        Route::resource('students', StudentController::class);
        Route::resource('issued-books', IssuedBookController::class);
        Route::post('issued-books/return/{id}', [IssuedBookController::class, 'returnBook'])->name('issued-books.return');
        
        Route::get('/profile', [AdminProfileController::class, 'show'])->name('admin.profile');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
        Route::put('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('admin.profile.password');
    });
});

// Student Routes
Route::prefix('student')->group(function () {
    Route::get('/register', [StudentAuthController::class, 'showRegisterForm'])->name('student.register');
    Route::post('/register', [StudentAuthController::class, 'register'])->name('student.register.submit');
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login.submit');
    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('student.logout');
    
    Route::middleware(['auth:student'])->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
        Route::get('/books', [StudentBookController::class, 'index'])->name('student.books.index');
        Route::get('/books/{id}', [StudentBookController::class, 'show'])->name('student.books.show');
        Route::get('/issued-books', [StudentIssuedBookController::class, 'index'])->name('student.issued-books.index');
        
        Route::get('/profile', [StudentProfileController::class, 'show'])->name('student.profile');
        Route::put('/profile', [StudentProfileController::class, 'update'])->name('student.profile.update');
        Route::put('/profile/password', [StudentProfileController::class, 'updatePassword'])->name('student.profile.password');
    });
});
