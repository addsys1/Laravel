<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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
    return view('welcome');
});

Route::prefix('client')->group(function(){

Route::get('/index',[ClientController::class,'ClientView'])->name('client.index') ;
Route::get('/create',[ClientController::class,'ClientCreate'])->name('client.create') ;
Route::post('/store',[ClientController::class,'ClientStore'])->name('client.store') ;
Route::get('/edit/{id}',[ClientController::class,'ClientEdit'])->name('client.edit') ;
Route::delete('/delete/{id}',[ClientController::class,'ClientDelete'])->name('client.delete') ;



Route::post('/store_added_file', [ClientController::class,'StoreAddFile'])->name('store_added_file');
// Route::get('view_file/{client_name}/{file_name}', [ClientController::class,'ViewFile'])->name('view_file');

Route::get('/view-file/{clientName}/{fileName}', [ClientController::class,'ViewFile'])->name('view.file');
Route::get('/download/{client_name}/{file_name}', [ClientController::class,'GetFile'])->name('download.file');
Route::post('delete_file',[ClientController::class,'DeleteFile'] )->name('delete.file');
} );
