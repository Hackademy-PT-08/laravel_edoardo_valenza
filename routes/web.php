<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [HomeController::class, 'index'])
->name('home');

Route::get('/articoli/aggiungi', [ArticleController::class, 'create'])
->name('articles.create');







//Ottieni tutti gli articoli
Route::get('/articoli', [ArticleController::class, 'index'])
->name('articles.index');

//Creazione di un nuovo articolo
Route::post('/articoli/aggiungi', [ArticleController::class, 'store'])
->name('articles.store');

//Mostro il form di aggiornamento articolo
Route::get('/articoli/modifica/{id}', [ArticleController::class, 'edit'])
->name('articles.edit');

//Aggiornamento di un articolo esistente
Route::put('/articoli/modifica/{id}', [ArticleController::class, 'update'])
->name('articles.update');

//Eliminazione di un articolo esistente
Route::delete('/articoli/elimina/{id}', [ArticleController::class, 'destroy'])
->name('articles.delete');









Route::get('/profilo', [UserController::class, 'index'])
->middleware(['auth', 'verified'])
->name('users.profile');
