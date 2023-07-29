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

Route::post('/articoli/aggiungi', [ArticleController::class, 'store'])
->name('articles.store');

Route::get('/profilo', [UserController::class, 'index'])
->middleware(['auth', 'verified'])
->name('users.profile');
