<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// testing dengan api postman untuk vote dari mahasiswa
Route::post('/vote', [VoteController::class, 'store_mahasiswa']);


// testing dengan api postman untuk vote dari admin
Route::post('/vote_admin', [VoteController::class, 'store']); // menambahkan vote
Route::post('/vote_edit/{id}', [VoteController::class, 'edit']); // edit vote
Route::delete('/vote/{id}', [VoteController::class, 'destroy']); // hapus vote
Route::get('/paslon-votes', [VoteController::class, 'hasil_paslon']); // cek hasil vote
Route::get('/detail-votes', [VoteController::class, 'show_all']); // cek detail vote

// testing dengan api postman untuk login
Route::post('/login', [AuthController::class, 'login']);

Route::get('/session', [AuthController::class, 'getSession']);

