<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\ProductController as ProductController;
use App\Http\Controllers\AdvertController as AdvertController;
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
Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/productdetail/{id}', [ProductController::class, 'productdetail'])->name('productdetail');
Route::get('/category',[CategoryController::class,'category'])->name('category');



/********************************* ILAN VER ROUTS *********************************************/

/********************************* ADIM 1 ROUTS ******************************************************/
Route::get('/ilan-ver/adim1',[AdvertController::class,'adim1'])->name('adim1');

/********************************* ADIM 2 ROUTS ******************************************************/
Route::get('/ilan-ver/adim2/{id}',[AdvertController::class,'adim2'])->name('adim2');
Route::get('/ilan-ver/adim2/{id}/{pid}',[AdvertController::class,'adim2_1'])->name('adim2_1');
Route::get('/ilan-ver/adim2/{id}/{pid}/{sid}',[AdvertController::class,'adim2_2'])->name('adim2_2');
Route::get('/ilan-ver/adim2/{id}/{pid}/{sid}/{fid}',[AdvertController::class,'adim2_3'])->name('adim2_3');
Route::post('/ilan-ver/adim2/{id}/{pid}/{sid}/{fid}/store',[AdvertController::class,'adim2store'])->name('adim2store');

/************************************** ADIM3 ROUTS ****************************************************/
Route::get('/ilan-ver/adim3',[AdvertController::class,'adim3'])->name('adim3');
Route::post('/ilan-ver/adim3/store',[AdvertController::class,'adim3store'])->name('adim3store');




/****************************************** ADMİM PANEL ROUTES *******************************************************/

