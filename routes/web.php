<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [BookController::class, 'index']);

Route::get('/books/create', [BookController::class, 'create']);

Route::post('/books', [BookController::class, 'store']);

Route::get('/books/list', [BookController::class, 'list']);

Route::get('/books/show/{id}', [BookController::class, 'show']);

Route::delete('/books/delete/{id}', [BookController::class, 'destroy']);

Route::get('/books/edit/{id}', [BookController::class, 'edit']);

Route::put('/books/update/{id}', [BookController::class, 'update']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
