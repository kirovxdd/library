<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index')->middleware('auth');
    Route::get('/books/create', [\App\Http\Controllers\BookController::class, 'create'])->name('books.create')->middleware('auth');
    Route::post('/books', [\App\Http\Controllers\BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name('books.show')->middleware('auth');
    Route::get('/books/{book}/edit', [\App\Http\Controllers\BookController::class, 'edit'])->name('books.edit')->middleware('auth');
    Route::patch('/books/{book}', [\App\Http\Controllers\BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [\App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/book/search', [\App\Http\Controllers\BookController::class, 'search'])->name('books.search')->middleware('auth');



