<?php

use App\Http\Controllers\ArticlesController;
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

Route::get(
    '/articulos',
    [ArticlesController::class, "index"]
)->name("articles");


Route::get('/articulo', [ArticlesController::class, "showNew"])->name("article");
Route::post('/articulo', [ArticlesController::class, "store"])->name("article");

Route::get('/articulo/{id}', [ArticlesController::class, "showEdit"])->name("article-edit");
Route::post('/articulo/{id}', [ArticlesController::class, "update"])->name("article-edit");

Route::delete('/articulo/{id}', [ArticlesController::class, "destroy"])->name("article-destroy");
