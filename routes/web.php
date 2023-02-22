<?php

use App\Http\Controllers\HelpAndGuide;
use App\Http\Controllers\HomeController;
use App\Models\HelpGuide;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/help_guide',[HelpAndGuide::class,'index'])->name('help_guide');
Route::get('/create',[HelpAndGuide::class,'create'])->name('create');
Route::post('/create',[HelpAndGuide::class,'store'])->name('store');

//store data
Route::get('/store-data',[HomeController::class,'store'])->name('store.covid');
Route::get('/edit/{id}',[HomeController::class,'edit'])->name('edit');
Route::post('/update',[HomeController::class,'update'])->name('update');
Route::get('/delete/{id}',[HomeController::class,'destroy'])->name('delete');

