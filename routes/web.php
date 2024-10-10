<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return redirect()->route('book.index');
});

//Author route
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
Route::get('author/index', [AuthorController::class, 'index'])->name('author.index');
Route::delete('author/destroy/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
Route::get('author/edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('author/update/{author}', [AuthorController::class, 'update'])->name('author.update');

//Category route
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::delete('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::put('/book/update/{book}', [BookController::class, 'update'])->name('book.update');
//book route
Route::get('book/index', [BookController::class, 'index'])->name('book.index');
Route::delete('book/destroy/{book}', [BookController::class, 'destroy'])->name('book.destroy');
Route::get('/book/show/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
