<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/articles',[ArticleController::class,'articles'])->name('articles') ;
Route::post('multideletearticles',[ArticleController::class,'multideletearticles'])->name('multideletearticles');
