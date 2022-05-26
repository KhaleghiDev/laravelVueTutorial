<?php

use App\Http\Controllers\LifeController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::get('life',[LifeController::class ,'index'])->name('admin.life.index');
    Route::get('life/create',[LifeController::class ,'create'])->name('admin.life.create');
    Route::post('life',[LifeController::class ,'store'])->name('admin.life.store');
    Route::get('life/{life}',[LifeController::class ,'show'])->name('admin.life.show');
    Route::get('life/{life}/edit',[LifeController::class ,'edit'])->name('admin.life.edit');
    Route::put('life/{life}/update',[LifeController::class ,'update'])->name('admin.life.update');
    Route::delete('life/{life}/delete',[LifeController::class ,'destroy'])->name('admin.life.destroy');


