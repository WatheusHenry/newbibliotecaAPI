<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// routes/api.php
use App\Http\Controllers\LivroController;

Route::get('/livros', [LivroController::class, 'index']);
Route::get('/livros/{livro}', [LivroController::class, 'show']);
Route::post('/livros', [LivroController::class, 'store']);
Route::post('/livros/alugar', [LivroController::class, 'alugarLivro']);
Route::put('/livros/{livro}', [LivroController::class, 'update']);
Route::delete('/livros/{livro}', [LivroController::class, 'destroy']);


use App\Http\Controllers\BibliotecariaController;

Route::get('/bibliotecarias', [BibliotecariaController::class, 'index']);
Route::get('/bibliotecarias/{bibliotecaria}', [BibliotecariaController::class, 'show']);
Route::post('/bibliotecarias', [BibliotecariaController::class, 'store']);
Route::put('/bibliotecarias/{bibliotecaria}', [BibliotecariaController::class, 'update']);
Route::delete('/bibliotecarias/{bibliotecaria}', [BibliotecariaController::class, 'destroy']);
