<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Products as Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public static function maincategorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public function index(){
        $categorydata= Category::all();
        $productdata = Product::all();
        $images = Image::all();
        return view("front.index",[
            'categorydata'=> $categorydata,
            'productdata' => $productdata,
            'images' => $images,
        ]);
    }

    public function login(){
        return view("auth.login");
    }
    public function logout(){
        Auth::logout();
        $categorydata= Category::all();
        $productdata = Product::all();
        $images = Image::all();
        return view("front.index",[
            'categorydata'=> $categorydata,
            'productdata' => $productdata,
            'images' => $images,
        ]);
    }
}
