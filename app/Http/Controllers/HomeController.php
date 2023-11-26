<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as Category;
use App\Models\Products as Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function maincategorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }
    public function index(){
        $categorydata= Category::all();
        $productdata = Product::all();
        return view("front.index",[
            'categorydata'=> $categorydata,
            'productdata' => $productdata
        ]);
    }

    public function login(){
        return view("auth.login");
    }
    public function logout(){
        Auth::logout();
        $categorydata= Category::all();
        $productdata = Product::all();
        return view("front.index",[
            'categorydata'=> $categorydata,
            'productdata' => $productdata
        ]);
    }
}
