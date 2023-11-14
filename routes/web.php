<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\ProductController as ProductController;

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
    return redirect('home');
});
Route::get('/home',function (){
    return view('/index');
});

Route::get('/anasayfa',[HomeController::class, "index"]);

Auth::routes();
Route::get('/login',[HomeController::class,'login'])->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/productdetail/{id}', [ProductController::class, 'productdetail'])->name('productdetail');
Route::get('/category',[CategoryController::class,'category'])->name('category');
Route::get('/ilan-ver/adim1',[CategoryController::class,'adim1'])->name('adim1');
Route::get('/ilan-ver/adim2',[CategoryController::class,'adim2'])->name('adim2');
Route::get('/ilan-ver/adim3',[CategoryController::class,'adim3'])->name('adim3');


