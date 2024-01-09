<?php

use App\Http\Controllers\Admin\AdminPanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\ProductController as ProductController;
use App\Http\Controllers\AdvertController as AdvertController;
use App\Http\Controllers\UserController as UserController;
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
Route::get('/search',[HomeController::class,'search'])->name('search');

/********************************* PRODUCTS ROUTS *********************************************/
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/productdetail/{id}', [ProductController::class, 'productdetail'])->name('productdetail');
Route::get('/productdetail/{id}/chat', [ProductController::class, 'createchat'])->name('createchat');
Route::get('/productdetail/{id}/toggleFavorite', [ProductController::class, 'toggleFavorite'])->name('toggleFavorite');
Route::get('/category/{title}',[CategoryController::class,'index'])->name('category');

/********************************* USER ROUTS *********************************************/
Route::get('/profile',[UserController::class,'profile'])->name('profile');
Route::post('/profile/store',[UserController::class,'profile_store'])->name('profile_store');
Route::get('/ilanlarim',[UserController::class,'myads'])->name('myads');
Route::get('/favorites',[UserController::class,'favorites'])->name('favorites');
Route::get('/messages',[UserController::class,'messages'])->name('messages');
Route::get('/chat/{id}',[\App\Http\Controllers\MessageController::class,'msg'])->name('msg');
Route::post('/chat/{id}/newmessage', [\App\Http\Controllers\MessageController::class, 'newmes'])->name('newmes');

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
Route::get('/ilan-ver/adim3/edit/{id}',[AdvertController::class,'adim3edit'])->name('adim3edit');
Route::post('/ilan-ver/adim3/edit/{id}/store',[AdvertController::class,'editstore'])->name('editstore');





/****************************************** ADMİM PANEL ROUTES *******************************************************/
Route::get('/admin',[AdminPanelController::class,'index'])->name('admin');
Route::get('/admin/category',[AdminPanelController::class,'category'])->name('category');
Route::post('/admin/category/store',[AdminPanelController::class,'adminstorecategory'])->name('adminstorecategory');
Route::get('/admin/category/delete/{id}',[AdminPanelController::class,'categorydelete'])->name('categorydelete');
Route::get('/admin/settings',[AdminPanelController::class,'settings'])->name('settings');
Route::get('/admin/users',[AdminPanelController::class,'users'])->name('users');



