<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
use App\Http\Controllers\UserController;            
            

Route::get('/', function () {return redirect('/books');})->middleware('auth');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/users',[UserController::class,'index'])->name('user.view');
	Route::post('/create-user',[UserController::class,'createUser'])->name('user.create');
	Route::post('/update-user',[UserController::class,'updateUser'])->name('user.update');
	Route::delete('/delete-user',[UserController::class,'deleteUser'])->name('user.delete');
	Route::get('/authors',[AuthorController::class,'index'])->name('author.view');
	Route::post('/create-author',[AuthorController::class,'createAuthor'])->name('author.create');
	Route::post('/update-author',[AuthorController::class,'updateAuthor'])->name('author.update');
	Route::delete('/delete-author',[AuthorController::class,'deleteAuthor'])->name('author.delete');
	Route::get('/books',[BookController::class,'index'])->name('book.view');
	Route::post('/create-book',[BookController::class,'createBook'])->name('book.create');
	Route::post('/update-book',[BookController::class,'updateBook'])->name('book.update');
	Route::delete('/delete-book',[BookController::class,'deleteBook'])->name('book.delete');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});