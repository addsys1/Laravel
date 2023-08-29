<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
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
    return view('dashboard');
})->name('dashboard');


Route::get('/countries',[CountryController::class,'countries'])->name('countries') ;
Route::get('/addcountries',[CountryController::class,'addcountries'])->name('addcountries') ;
Route::Post('/storecountries',[CountryController::class,'storecountries'])->name('storecountries') ;

Route::get('/editcountries/{id}',[CountryController::class,'editcountries'])->name('editcountries') ;

Route::post('/updatecategories/{id}',[CountryController::class,'updatecategories'])->name('updatecategories') ;

Route::get('/delcountries/{id}',[CountryController::class,'delcountries'])->name('delcountries') ;


Route::prefix('city')->group(function(){

Route::get('/index',[CityController::class,'CityView'])->name('city.index') ;

Route::get('/create',[CityController::class,'CityCreate'])->name('city.create') ;

Route::post('/store',[CityController::class,'CityStore'])->name('city.store') ;

Route::get('/edit/{id}',[CityController::class,'CityEdit'])->name('city.edit') ;

Route::post('/update/{id}',[CityController::class,'CityUpdate'])->name('city.update') ;

Route::get('/delete/{id}',[CityController::class,'CityDelete'])->name('city.delete') ;
}); 