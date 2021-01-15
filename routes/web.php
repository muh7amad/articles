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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\ArticleController::class, 'index'])->name('home');

Route::get('/fail', function () {
    return view('not_admin_view');
});

Route::get('/master', function () {
    return view('layouts.master');
});

// Articles
Route::get('/index', [App\Http\Controllers\ArticleController::class, 'index'])->name('index');
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'articles'])->name('all_articles');
Route::get('/articles/{categoryId}', [App\Http\Controllers\ArticleController::class, 'getArticles'])->name('articles');
Route::get('/details/{id}', [App\Http\Controllers\ArticleController::class, 'details'])->name('single');
Route::get('/delete/{articleId}',[App\Http\Controllers\ArticleController::class,'delete'])->name('delete-article');

Route::get('/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('create')->middleware('admin');
Route::post('/save',[App\Http\Controllers\ArticleController::class,'save'])->name('save-article');

//favorites
Route::get('/myFavorites', [App\Http\Controllers\ArticleController::class, 'getMyArticles'])->name('myFavorites');
Route::post('/favorite/{article_id}', [\App\Http\Controllers\ArticleController::class,'favoriteArticle'])->name('favorite');
Route::post('/un_favorite/{article_id}', [\App\Http\Controllers\ArticleController::class,'unFavoriteArticle'])->name('un_favorite');

