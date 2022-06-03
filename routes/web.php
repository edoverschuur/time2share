<?php

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

Route::middleware(['auth'])->group(function() {
    Route::get('/maak', [\App\Http\Controllers\ProductController::class,'create']);
    Route::post('/producten', [\App\Http\Controllers\ProductController::class,'store']);

    Route::get('/profiel', [\App\Http\Controllers\ProductController::class,'profileAuth']);
    Route::get('/profiel/{id}', [\App\Http\Controllers\ProductController::class,'profileUser']);

    Route::put('/profiel/{id}', [\App\Http\Controllers\ProductController::class,'blockUser']);

    Route::get('/aannemen/{id}', [\App\Http\Controllers\ProductController::class,'productReturn']);
    Route::post('/aannemen/{id}', [\App\Http\Controllers\ProductController::class,'productAccept']);
});

Route::get('/', [\App\Http\Controllers\ProductController::class,'productAll']);
Route::get('/producten', [\App\Http\Controllers\ProductController::class,'productAll']);

Route::middleware(['auth'])->group(function() {
    Route::get('/producten/{id}', [\App\Http\Controllers\ProductController::class,'productPage']);
    Route::put('/producten/{id}', [\App\Http\Controllers\ProductController::class,'editState']);
    Route::put('/producten/{id}', [\App\Http\Controllers\ProductController::class,'deleteProduct']);
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
