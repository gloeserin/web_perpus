<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\BookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('index');
});

    Route::middleware(['isLogin'])->group(function () {
Route::get('/home', [LibraryController::class, 'index'])->name('home');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['isLogin', 'roleCheck:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/user', [DashboardController::class, 'user'])->name('dashboard.user');
    Route::get('/dashboard/book', [BookController::class, 'index'])->name('dashboard.book');
    Route::post('/dashboard/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/dashboard/categories', [DashboardController::class, 'categories'])->name('dashboard.categories');
    Route::get('/dashboard/book/{id}/delete', [BookController::class, 'destroy'])->name('book.delet');
});


Route::middleware(['isGuest'])->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/register/store', [UserController::class, 'store'])->name('register.store');
    Route::post('/login/auth', [UserController::class, 'auth'])->name('auth');
});