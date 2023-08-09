<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
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

//Ottieni tutti gli articoli
Route::get('/articoli', [ArticleController::class, 'index'])
->name('articles.index');

//Mostro il form di creazione articolo
Route::get('/articoli/aggiungi', [ArticleController::class, 'create'])
->name('articles.create')
->middleware('auth');

//Creazione di un nuovo articolo
Route::post('/articoli/aggiungi', [ArticleController::class, 'store'])
->name('articles.store')
->middleware('auth');

//Mostro il form di aggiornamento articolo
Route::get('/articoli/modifica/{id}', [ArticleController::class, 'edit'])
->name('articles.edit');

//Aggiornamento di un articolo esistente
Route::put('/articoli/modifica/{id}', [ArticleController::class, 'update'])
->name('articles.update');

//Eliminazione di un articolo esistente
Route::delete('/articoli/elimina/{id}', [ArticleController::class, 'destroy'])
->name('articles.delete');

//Lista tag
Route::get('/tag', [TagController::class, 'index'])
->name('tags.index');

//Form aggiunta tag
Route::get('/tag/aggiungi', [TagController::class, 'create'])
->name('tags.create');

//Aggiunta tag
Route::post('/tag/aggiungi', [TagController::class, 'store'])
->name('tags.store');

//Form modifica tag
Route::get('/tag/modifica/{id}', [TagController::class, 'edit'])
->name('tags.edit');

//Modifica tag
Route::put('/tag/modifica/{id}', [TagController::class, 'update'])
->name('tags.update');

//Mostra articoli per tag
Route::get('/tag/{id}', [TagController::class, 'show'])
->name('tags.show');

//Elimina tag
Route::delete('/tag/elimina/{id}', [TagController::class, 'destroy'])
->name('tags.destroy');

//Profilo
Route::get('/profilo', [UserController::class, 'index'])
->middleware(['auth', 'verified'])
->name('users.profile');

Route::get('/articoli-utente', [UserController::class, 'articles'])
->middleware(['auth', 'verified'])
->name('users.articles');
