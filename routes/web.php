<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::get('/', [ArticleController::class, 'index'])->name('article.index');
Route::post('/search', [ArticleController::class, 'search'])->name('article.search');
Route::post('/replace', [ArticleController::class, 'replace'])->name('article.replace');
Route::get('/sort', [ArticleController::class, 'sortWords'])->name('article.sort');
