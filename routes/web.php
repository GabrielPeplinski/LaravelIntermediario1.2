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
Route::get('/', [BookController::class, 'welcome']);

Route::resource('/books', BookController::class)->middleware('auth');

Route::resource('/borrows', BorrowController::class)->middleware('auth');

Route::post('/borrows/{book}', [BorrowController::class, 'store'])->middleware('auth');

Route::get('/borrows/{borrow}', [BorrowController::class, 'update'])->middleware('auth');

Route::get('/report', [BorrowController::class, 'makeReport'])->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('welcome');
});
