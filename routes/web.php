<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;

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

Route::get('/', [BookController::class, 'index']);

Route::get('/books/create', [BookController::class, 'create'])->middleware('auth');

Route::post('/books', [BookController::class, 'store'])->middleware('auth');

Route::get('/books/list', [BookController::class, 'list'])->middleware('auth');

Route::get('/books/show/{book}', [BookController::class, 'show'])->middleware('auth');

Route::delete('/books/delete/{book}', [BookController::class, 'destroy'])->middleware('auth');

Route::get('/books/edit/{book}', [BookController::class, 'edit'])->middleware('auth');

Route::put('/books/update/{book}', [BookController::class, 'update'])->middleware('auth');

Route::post('/books/borrow/{book}', [BorrowController::class, 'store'])->middleware('auth');

Route::get('/books/borrows/list', [BorrowController::class, 'list'])->middleware('auth');

Route::delete('/books/borrows/delete/{borrow}', [BorrowController::class, 'destroy'])->middleware('auth');

Route::get('/books/borrows/update/{borrow}', [BorrowController::class, 'update'])->middleware('auth');

Route::get('/books/borrows/report', [BorrowController::class, 'makeReport'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('welcome');
});
