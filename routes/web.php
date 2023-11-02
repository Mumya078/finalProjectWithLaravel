<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;

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
    return view('welcome');
});
Route::get('/home',function (){
    return view('/index');
});

Route::get('/anasayfa',[HomeController::class, "index"]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/productdetail', [App\Http\Controllers\HomeController::class, 'productdetail'])->name('productdetail');
Route::get('/ilan-ver/adim1',[HomeController::class,'adim1'])->name('adim1');
Route::get('/ilan-ver/adim2',[HomeController::class,'adim2'])->name('adim2');
Route::get('/ilan-ver/adim3',[HomeController::class,'adim3'])->name('adim3');


