<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaslonController;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\VoteController;

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

Route::get('/paslon', [PaslonController::class, 'index']);
Route::post('/paslon', [PaslonController::class, 'store']);
Route::get('/paslon/{id}/show', [PaslonController::class, 'show']);
Route::get('/paslon/{id}/edit', [PaslonController::class, 'edit']);
Route::post('/paslon/{id}/update', [PaslonController::class, 'update']);
Route::delete('/paslon/{id}/delete', [PaslonController::class, 'destroy']);

Route::get('/cake', [CakeController::class, 'index']);
Route::post('/cake', [CakeController::class, 'store']);
Route::get('/cake/{id}/show', [CakeController::class, 'show']);
Route::get('/cake/{id}/edit', [CakeController::class, 'edit']);
Route::post('/cake/{id}/update', [CakeController::class, 'update']);
Route::delete('/cake/{id}/delete', [CakeController::class, 'destroy']);

Route::get('/pengalaman', [PengalamanController::class, 'index']);
Route::post('/pengalaman', [PengalamanController::class, 'store']);
Route::get('/pengalaman/{id}/show', [PengalamanController::class, 'show']);
Route::get('/pengalaman/{id}/edit', [PengalamanController::class, 'edit']);
Route::post('/pengalaman/{id}/update', [PengalamanController::class, 'update']);
Route::delete('/pengalaman/{id}/delete', [PengalamanController::class, 'destroy']);

// route untuk mahasiswa voting
// Route::post('/vote', [VoteController::class, 'store_mahasiswa']);
